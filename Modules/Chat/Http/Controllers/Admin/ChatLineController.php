<?php

namespace Modules\Chat\Http\Controllers\Admin;

use App\Events\SendMessage;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Chat\Entities\Chat;
use Modules\Chat\Entities\ChatLine;
use Modules\File\Entities\File;

class ChatLineController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function send_chat(Request $request)
    {
        $this->authorize('send_chat', Chat::class);

        $response = [
            'message' => 'پیام با موفقیت ارسال شد'
        ];
        $chat_id = $request->input('chat_id');
        if ($chat_id == 'general_user') {
            $user_chat = Auth::user()->chat->first();
            if ($user_chat) {
                $chat_id = $user_chat->id;
            } else {
                $chat_id = Auth::user()->chat()->create()->id;
            }
            $response['chat_id'] = $chat_id;
        }


        $chat_line = new ChatLine();


        if ($request->input('content_type') == 'file') {
            //message is a file
            $file = $request->file('file');
            //generate a name for file
            $file_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . rand() . time()  . '.' . $file->extension();

            // save file in db
            $new_file = new File();
            $new_file->title = $file->getClientOriginalName();
            $new_file->link = $file_name;
            $new_file->size = $file->getSize();
            $new_file->save();

            //set file_id of chat_line
            $chat_line->file_id = $new_file->id;

            //upload file
            $file->move(ChatLine::$prefix_files, $file_name);

            //set content_type of chat_line 'file'
            $chat_line->content_type = 'file';

            //set link of response to show url of file
            $response['link'] = $chat_line->full_link();
        } else {
            //message is a text
            $chat_line->content = $request->input('content');
        }

        // save chat_line in db
        $chat_line->chat_id = $chat_id;
        $chat_line->user_id = Auth::id();
        $chat_line->send_status = 'received';
        $chat_line->save();

        //return response
        $x = ['content_type' => $request->input('content_type'),  'own_type' => 'not_me', 'send_status' => 'received', 'time' => $chat_line->created_at->format('H:i')];

        switch ($chat_line->content_type) {
            case 'file':
                // declare file of response for file chatline
                $x['file'] = [
                    'title' => $chat_line->file->title,
                    'link' => $chat_line->full_link(),
                    'size' => $chat_line->file->size,
                ];
                break;
            default:
                // declare content of response for text chatline
                $x['content'] = $chat_line->content;
        }

        SendMessage::dispatch($x, $chat_id, Auth::id());

        return response()->json($response, 201);
    }
}
