<?php

namespace App\Http\Controllers\Provider;

use App\Models\Contact;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\NurseNewQueryNotification;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages    = [];
        $user        = auth()->user();
        $contacts    = Contact::with('lastMessage')->where('provider_id', $user->id)->get();
        return view('providers.inbox', compact('user', 'contacts', 'messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $contact              = Contact::where(['nurse_id' => $request->nurse, 'provider_id' => $user->id])->first();
        if (!$contact) {
            $contact = Contact::create([
                'provider_id' => $user->id,
                'nurse_id'    => $request->nurse,
            ]);
        }
        Message::create([
            'contact_id'  => $contact->id,
            'receiver'    => $request->nurse,
            'sender'      => $user->id,
            'message'     => $request->message,
            'status'      => 1,
        ]);
        $contact->nurse->notify(new NurseNewQueryNotification());
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
        $contacts    = Contact::with('lastMessage')->where('provider_id', $user->id)->get();
        $messages    = Message::with('senderUser', 'receiverUser')->where('contact_id', $id)->get();
        // dd($messages);
        return view('providers.inbox', compact('user', 'contacts', 'messages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
