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
use App\Message;
use Auth;
use \Input as Input;


class MessageController extends BaseController
{
    public function sendMessage(Request $request)
    {
        $message = new Message();
        $message->sender_id = $request->from;
        $message->receiver_id = $request->to;
        $message->message = $request->message;
        $message->save();
        return response(200);
    }

    public function getMessages(Request $request)
    {
        $id = Auth::user()->id;
        $messages = Message::where('receiver_id', '=', $id)->get();
        foreach($messages as $message){
            $message->sender_id = $message->getSender($message->sender_id);
        }
        return response()->json($messages);
    }
}