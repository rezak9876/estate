<?php

namespace Modules\Chat\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Chat\Entities\ChatLine;

class ChatLineController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function send_chat(Request $request)
    {
        $chat_line = new ChatLine();
        $chat_line->chat_id = $request->input('chat_id');
        $chat_line->user_id = Auth::id();
        $chat_line->message = $request->input('content');
        $chat_line->send_status = 'received';
        $chat_line->save();
        return response()->json([
            'message' => 'پیام با موفقیت ارسال شد'
        ], 201);
    }
}
