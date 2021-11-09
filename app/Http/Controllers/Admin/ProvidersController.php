<?php

namespace App\Http\Controllers\Admin;

use Stripe\Charge;
use Stripe\Stripe;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProvidersController extends Controller
{
    public function index()
    {
        $providers = User::with('provider')->where('type', 2)->get();
        return view('admin.providers', compact('providers'));
    }

    public function edit($id)
    {
        $user = User::with('provider')->findOrFail($id);
        return view('admin.provider-edit-profile', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->businessName,
        ]);
        $user->provider()->update([
            'hiringPerson'          => $request->hiringPerson,
            'hiringPersonEmail'     => $request->hiringPersonEmail,
            'hiringPersonPhone'     => $request->hiringPersonPhone,
            'paymentPersonName'     => $request->paymentPersonName,
            'paymentPersonEmail'    => $request->paymentPersonEmail,
            'paymentPersonPhone'    => $request->paymentPersonPhone,
            'businessType'          => $request->type,
            'insurance'             => $request->insurance,
            'zip'                   => $request->zip,
            'experince'             => $request->experince,
            'about'                 => $request->about,
            'businessType'          => $request->type,
            'zip'                   => $request->zip,
            'experince'             => $request->experince,
            'about'                 => $request->about,
        ]);
        session()->flash('alert-success', 'Profile has been updated successfully!');
        return redirect()->route('admin.provider.edit', $id);
    }

    public function suspendAccount($id)
    {
        User::findOrFail($id)->update(['status' => 'suspended']);
        session()->flash('alert-warning', 'Profile has been suspened!');
        return redirect()->back();
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        session()->flash('alert-warning', 'Profile has been deleted!');
        return redirect()->back();
    }

    public function charge()
    {
        $providers = User::where(['type' => 2])->get();
        return view('admin.charge-medical-provider', compact('providers'));
    }

    public function chargeProcess(Request $request)
    {
        $provider = User::findOrFail($request->provider);
        Stripe::setApiKey(config('services.stripe.secret'));
        $charge = Charge::create([
            'amount'   => ($request->amount * 100),
            'currency' => 'usd',
            'customer' => $provider->stripeAccount,
        ]);
        if ($charge->status == 'success' || $charge->status == 'pending') {
            Payment::create([
                'provider_id'    => $provider->id,
                'transaction_id' => $charge->id,
                'amount'         => $request->amount,
                'status'         => $charge->status,
            ]);
            session()->flash('alert-success', 'Your transaction has been initiated!');
            return redirect()->back();
        }
        session()->flash('alert-danger', 'Something went wrong, Please try again!');
        return redirect()->back();
    }
}
