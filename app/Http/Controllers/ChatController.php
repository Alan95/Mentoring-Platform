<?php

namespace App\Http\Controllers;

use Faker\Provider\Image;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\Chat;
use Auth;
use \Input as Input;
use App\Events\ChatSent;


class ChatController extends BaseController
{
    public function index()
    {
        return view('chat');
    }

    /**
     * Fetch all messages
     *
     * @return Chat
     */
    public function fetchChats()
    {
        return Chat::with('user')->get();
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function sendChat(Request $request)
    {
        $user = Auth::user();

        $chat = $user->chats()->create([
            'chat' => $request->input('chat'),
        ]);


        broadcast(new ChatSent($user, $chat))->toOthers();

        return ['status' => 'Chat Sent!'];
    }
}