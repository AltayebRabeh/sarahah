<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;

class MessagesController extends Controller
{
    public  function messages() {
        $messages = auth()->user()->messages()->paginate(10);

        return view('messages', compact('messages'));
    }

    public  function getSendMessageForm($username) {
        $user = User::whereUsername($username)->first();

        return view('send_message', compact('user'));
    }

    public  function sendMessage(Request $request, $username) {

        $validation = Validator::make($request->all(), ['message' => 'required|min:10|max:500']);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $user = User::whereUsername($username)->first();

        if ($user) {
            Message::create([
                'message' => $request->message,
                'ip_address' => $request->ip(),
                'user_id' => $user->id
            ]);

            return view('send_message', compact('user'));
        }
    }
}
