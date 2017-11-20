<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $messages = Message::paginate(2);
        return view('welcome', compact('messages'));
    }
}
