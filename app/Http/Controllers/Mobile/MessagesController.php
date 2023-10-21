<?php

namespace App\Http\Controllers\Mobile;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class MessagesController extends Controller
{
    public function store(Request $request)
    {
        $message = new Message();
        $message->fill($request->all());
        $message->author = Auth::id();
        $message->save();

        return ["message" => "Message sent!"];
    }
}
