<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\User;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{

    public function __construct() {

        $this->middleware('auth');
    
    }

    public function index() {

        $messages = Message::with('userFrom')->where('user_id_to', Auth::id())->NotDeleted()->orderBy('created_at', 'desc')->paginate(10);

        return view('home')->with('messages', $messages);

    }

    public function create(int $id = 0, String $subject = '') {

        if ($id === 0) {

            $users = User::where('id', '!=', Auth::id())->get();

        } else {

            $users = User::where('id', $id)->get();

        }

        if ($subject !== '') $subject = "Re: ".$subject;

        return view('create')->with( ['users' => $users, 'subject' => $subject]);

    }

    public function send(Request $request) {

        $this->validatedData();

        $message = new Message();

        $message->user_id_from = Auth::id();
        $message->user_id_to = $request->input('to');
        $message->subject = $request->input('subject');
        $message->message = $request->input('message');
        $message->save();

        return redirect()->to('home')->with('status', 'Sent a message successfully!');

    }

    public function sent() {

        $messages = Message::with('userTo')->where('user_id_from', Auth::id())->NotDeleted()->orderBy('created_at', 'desc')->get();

        return view('sent')->with('messages', $messages);

    }

    public function read(int $id) {
    
        $message = Message::with('userFrom')->find($id);

        $message->read = true;
        $message->save();

        return view('read')->with('message', $message);

    }

    public function readSentItem(int $id) {
    
        $message = Message::with('userFrom')->find($id);

        return view('read')->with('message', $message);

    }

    public function delete(int $id) {
    
        $message = Message::find($id);

        $message->deleted = true;
        $message->save();

        return redirect()->to('home')->with('status', 'Message deleted successfully.');

    }

    public function deleted() {

        $messages = Message::with('userFrom')->where('user_id_to', Auth::id())->Deleted()->orderBy('created_at', 'desc')->get();

        return view('deleted')->with('messages', $messages);

        // $messagesSent = Message::with('userTo')->where('user_id_from', Auth::id())->Deleted()->orderBy('created_at', 'desc')->get();

        // return view('deleted')->with('messagesSent', $messagesSent);

    }

    public function return(int $id) {

        $message = Message::find($id);

        $message->deleted = false;
        $message->save();

        return redirect()->to('home')->with('status', 'Message returned to inbox successfully.');
    }

    public function returnSentItem(int $id) {

        $message = Message::find($id);

        $message->deleted = false;
        $message->save();

        return redirect()->to('home')->with('status', 'Message returned to sent box successfully.');
    }

    protected function validatedData() {

        return request()->validate([
            'subject' => 'required',
            'message' => 'required|max:255'
        ]);

    }

}

