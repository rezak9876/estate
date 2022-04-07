<?php

namespace Modules\Chat\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Chat\Entities\Chat;
use Modules\Chat\Entities\ChatLine;
use Modules\Chat\Transformers\ChatCollection;
use Modules\Chat\Transformers\ChatLineCollection;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $chats = Chat::orderBy('created_at', 'desc')->get();
        return response()->json(new ChatCollection($chats), 200);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('chat::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        if ($id == 'general_user') {
            $chat = Auth::user()->chat->first();
            if ($chat == null) {
                return response()->json([
                    'message' => 'پیام یافت نشد'
                ], 204);
            } else {
                $chat_id = $chat->id;
            }
        } else {
            $chat =  Chat::where('id', $id)->first();
            $chat_id = null;
        }

        $chatLines = $chat->chat_lines->sortBy('created_at');
        return response()->json((new ChatLineCollection($chatLines))->chat_id($chat_id), 200);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('chat::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
