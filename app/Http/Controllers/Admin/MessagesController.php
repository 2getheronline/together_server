<?php

namespace App\Http\Controllers\Admin;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Jobs\ReplayMessage;

class MessagesController extends Controller
{
    public function index()
    {
        return $this->loadMessages();
    }

    public function store(Request $request)
    {
        $message = new Message();
        $message->fill($request->all());
        $message->author = Auth::id();
        $message->save();
        
        ReplayMessage::dispatch(Auth::user(), $message);

        return $this->loadMessages();
    }

    private function loadMessages()
    {
        return Message::with('user')
            ->with('childs.user')
            ->whereNull('parent')
            ->orderBy('created_at', 'desc')
            ->paginate(50);
    }
}
