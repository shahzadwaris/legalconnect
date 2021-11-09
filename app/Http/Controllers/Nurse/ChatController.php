<?php

namespace App\Http\Controllers\Nurse;

use App\Models\Contact;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    public function index()
    {
        $messages    = [];
        $user        = auth()->user();
        $contacts    = Contact::with('lastMessage')->where('nurse_id', $user->id)->get();
        return view('nurses.inbox', compact('user', 'contacts', 'messages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user                 = auth()->user();
        $contact              = Contact::where(['provider_id' => $request->nurse, 'nurse' => $user->id])->first();
        if (!$contact) {
            $contact = Contact::create([
                'nurse_id'       => $user->id,
                'provider_id'    => $request->nurse,
            ]);
        }
        Message::create([
            'contact_id'  => $contact->id,
            'receiver'    => $request->id,
            'sender'      => $user->nurse,
            'message'     => $request->message,
            'status'      => 1,
        ]);
        session()->flash('alert-success', 'Your query has been sent!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user        = auth()->user();
        $contacts    = Contact::with('lastMessage')->where('nurse_id', $user->id)->get();
        $messages    = Message::with('senderUser', 'receiverUser')->where('contact_id', $id)->get();
        // dd($messages);
        return view('nurses.inbox', compact('user', 'contacts', 'messages'));
    }
}
