<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMessageRequest;
use App\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function show(Message $message)
    {
        return view('messages.show', compact('message'));
    }

    public function store(CreateMessageRequest $request)
    {
        $message = Message::create([
            'content' => $request->message,
            'image' => 'https://lorempixel.com/125/125/?' . mt_rand(0,100),
        ]);

        return redirect("/messages/$message->id");
    }
}
