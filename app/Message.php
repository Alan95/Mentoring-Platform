<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillables = [
        'sender_id', 'receiver_id', 'message'
    ];

    public function getSender()
    {
        return User::where('id', $this->sender_id)->select('id','username')->first();
    }

    public function getReceiver()
    {
        return User::where('id', $this->receiver_id)->first();
    }
}
