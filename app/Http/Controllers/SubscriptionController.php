<?php
namespace App\Http\Controllers;

use Stripe\Stripe;
use Stripe\StripeClient;
use Stripe\Subscription;
use Illuminate\Http\Request;
use Stripe\Issuing\Transaction;
use Stripe\BillingPortal\Session;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('payment.pricing');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        $checkout = \Stripe\Checkout\Session::create([
            'line_items' => [[
                'price'    => $id == 'monthly' ? config('services.stripe.product1') : config('services.stripe.product2'),
                'quantity' => 1,
            ]],
            'customer_email'        => auth()->user()->email,
            'mode'                  => 'subscription',
            'allow_promotion_codes' => true,
            'success_url'           => route('sub.store') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url'            => route('sub.index'),
        ]);
        session()->flash('alert-success', 'Your plan has been subscribed successfully!');
        return redirect()->away($checkout->url);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        $session      = \Stripe\Checkout\Session::retrieve($request->session_id);
        // $subscription = Subscription::retrieve(
        //     $session->subscription,
        //     []
        // );
        $user = auth()->user();
        $user->update(['isPaid' => 1, 'stripeAccount' => $session->customer]);
        // $user->transaction()->create([
        //     'startDate'  => date('d:M:y', $subscription->current_period_start),
        //     'expireDate' => date('d:M:y', $subscription->current_period_end),
        // ]);
        return redirect()->route('provider.profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        $session = Session::create([
            'customer'   => auth()->user()->stripeAccount,
            'return_url' => route('provider.profile'),
        ]);
        return redirect()->away($session->url);
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
