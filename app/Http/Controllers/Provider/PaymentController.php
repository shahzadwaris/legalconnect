<?php

namespace App\Http\Controllers\Provider;

use Carbon\Carbon;
use Stripe\Charge;
use Stripe\Stripe;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\MDPaymentNotification;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user     = auth()->user();
        $payments = $user->payments;
        $today    = Payment::whereDate('created_at', Carbon::today())->where('provider_id', $user->id)->sum('amount');
        $total    = Payment::where('provider_id', $user->id)->sum('amount');
        return view('providers.payments', compact('user', 'payments', 'today', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        if (!($user->stripeAccount)) {
            session()->flash('alert-danger', 'Please connect your back first!');
            return redirect()->back();
        }
        return view('providers.create-payment', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        Stripe::setApiKey(config('services.stripe.secret'));
        $charge = Charge::create([
            'amount'   => ($request->amount * 100),
            'currency' => 'usd',
            'customer' => $user->stripeAccount,
        ]);
        if ($charge->status == 'success' || $charge->status == 'pending') {
            $payment = Payment::create([
                'provider_id'    => $user->id,
                'transaction_id' => $charge->id,
                'amount'         => $request->amount,
                'status'         => $charge->status,
            ]);
            User::findOrFail(1)->notify(new MDPaymentNotification($user, $payment));
            session()->flash('alert-success', 'Your transaction has been initiated!');
            return redirect()->back();
        }

        session()->flash('alert-danger', 'Something went wrong, Please try again!');
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
        //
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
