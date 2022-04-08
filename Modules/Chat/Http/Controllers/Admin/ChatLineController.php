<?php

namespace Modules\Chat\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Chat\Entities\ChatLine;
use Modules\File\Entities\File;

class ChatLineController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function send_chat(Request $request)
    {
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
        return response()->json($response, 201);
    }
}
