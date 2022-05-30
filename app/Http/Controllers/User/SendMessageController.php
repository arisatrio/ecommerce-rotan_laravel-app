<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

use App\Models\Message;
use App\Events\MessageSent;

class SendMessageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'name'      => 'string|required|min:2',
            'email'     => 'email|required',
            'message'   => 'required|min:20|max:200',
            'subject'   => 'string|required',
            'phone'     => 'numeric|required'
        ]);

        $message = Message::create($request->all());
        $data = array(
            'url'       => route('message.show', $message->id),
            'date'      => $message->created_at->format('F d, Y h:i A'),
            'name'      => $message->name,
            'email'     => $message->email,
            'phone'     => $message->phone,
            'message'   => $message->message,
            'subject'   => $message->subject,
            'photo'     => Auth()->user()->photo,
        );
        
        event(new MessageSent($data));
        exit();
    }
}
