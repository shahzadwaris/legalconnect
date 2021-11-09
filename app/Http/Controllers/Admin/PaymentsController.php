<?php

namespace App\Http\Controllers\Admin;

use App\Models\Payment;
use App\Http\Controllers\Controller;

class PaymentsController extends Controller
{
    public function index()
    {
        $payments = Payment::with('provider', 'nurse')->get();
        return view('admin.payments', compact('payments'));
    }
}
