<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Stripe\Stripe;
use App\Models\User;
use Stripe\Transfer;
use App\Models\Payment;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\NursePaymentNotification;
use App\Notifications\Admin\NursePaymentNotification as AdminNurseNotification;

class NursesController extends Controller
{
    public function index()
    {
        $nurses = User::with('worker', 'worker.profession')->where('type', 1)->get();
        return view('admin.nurses', compact('nurses'));
    }

    public function edit($id)
    {
        $categories = Category::all();
        $user       = User::with('worker')->findOrFail($id);
        return view('admin.nurse-edit-profile', compact('user', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $user = User::with('nurse')->findOrFail($id);
        $user->update(['name' => $request->name]);
        $user->nurse()->update([
            'category_id'                   => $request->category,
            'dob'                           => $request->dob,
            'address'                       => $request->address,
            'insurance'                     => $request->insurance,
            'zip'                           => $request->zip,
            'salary'                        => $request->salary,
            'travel'                        => $request->travel,
            'experienceInYears'             => $request->years,
            'experiences'                   => implode(',', $request->experiences),
            'about'                         => $request->about,
        ]);
        session()->flash('alert-success', 'Profile has been updated successfully!');
        return redirect()->route('admin.nurse.edit', $id);
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        session()->flash('alert-warning', 'Profile has been deleted!');
        return redirect()->back();
    }
    public function makePayment()
    {
        $nurses = User::where('type', '1')->get();
        return view('admin.pay-to-nurse', compact('nurses'));
    }

    public function makePaymentProcess(Request $request)
    {
        $nurse = User::where('username', $request->nurse)->first();

        Stripe::setApiKey(config('services.stripe.secret'));
        try {
            $transfer = Transfer::create([
                'amount'         => ($request->amount * 100),
                'currency'       => 'usd',
                'destination'    => $nurse->stripeAccount,
                'transfer_group' => date('M d, Y H:i:s'),
            ]);
            $payment = Payment::create([
                'nurse_id'       => $nurse->id,
                'transaction_id' => $transfer->id,
                'amount'         => $request->amount,
                'status'         => 'success',
            ]);
            $nurse->notify(new NursePaymentNotification($nurse, $payment));
            // $nurse->notify(new AdminNurseNotification($payment));
            session()->flash('alert-success', 'Your transaction has been initiated!');
            return redirect()->back();
        } catch (Exception $e) {
            session()->flash('alert-danger', 'Something went wrong, Please try again!');
            return redirect()->back();
        }
    }
}
