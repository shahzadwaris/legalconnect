<?php
namespace App\Http\Controllers\Admin;

use Stripe\Charge;
use Stripe\Stripe;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class ProvidersController extends Controller
{
    public function index()
    {
        $providers = User::with('firm')->where('type', 2)->get();
        return view('admin.providers', compact('providers'));
    }

    public function edit($id)
    {
        $categories = Category::all();
        $user       = User::with('firm')->findOrFail($id);
        return view('admin.provider-edit-profile', compact('user', 'categories'));
    }

    public function markPaid($id)
    {
        User::findOrFail($id)->update(['isPaid' => 1]);
        session()->flash('alert-success', 'Provider is marked as Paid');
        return redirect()->back();
    }

    public function markUnPaid($id)
    {
        User::findOrFail($id)->update(['isPaid' => null]);
        session()->flash('alert-warning', 'Provider is marked as Unpaid');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->businessName,
        ]);
        $user->firm()->update([
            'hiringPerson'           => $request->hiringPerson,
            'hiringPersonEmail'      => $request->hiringPersonEmail,
            'hiringPersonPhone'      => $request->hiringPersonPhone,
            'paymentPersonName'      => $request->paymentPersonName,
            'paymentPersonEmail'     => $request->paymentPersonEmail,
            'paymentPersonPhone'     => $request->paymentPersonPhone,
            'businessType'           => $request->type,
            'specialize'             => $request->specialize,
            'employees'              => $request->employees,
            'specialize'             => is_array($request->experiences) ? implode(',', $request->experiences) : '',
            'about'                  => $request->about,
            'zip'                    => $request->zip,
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
