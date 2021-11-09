<?php

namespace App\Http\Controllers;

use App\Models\Query;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $query = Query::create([
            'email'   => $request->email,
            'name'    => $request->name,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
        Mail::to('contact@medconnectus.com')->send(new ContactMail($query));
        return response()->json(['success' => 'success'], 200);
    }
}
