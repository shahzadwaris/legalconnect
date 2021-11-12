<?php

namespace App\Http\Controllers\Provider;

use App\Models\Job;
use App\Models\User;
use App\Models\Payment;
use App\Models\Provider;
use App\Models\Connection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProviderBusinessDetailsRequest;
use App\Models\Category;
use App\Models\Firm;

class ProviderController extends Controller
{
    public function index()
    {
        $user     = auth()->user();
        $active   = Job::where('user_id', $user->id)->count();
        $hired    = Connection::where(['provider_id' =>  $user->id, 'status' => 'HIRED'])->count();
        $payments = Payment::where(['provider_id' =>  $user->id, 'status' => 'HIRED'])->sum('amount');
        return view('providers.index', compact('user', 'active', 'hired', 'payments'));
    }

    public function profile()
    {
        $categories = Category::all();
        $user = User::with('firm')->where('id', auth()->user()->id)->first();
        return view('providers.profile', compact('user', 'categories'));
    }

    public function updateBusinessDetails(ProviderBusinessDetailsRequest $request)
    {
        // dd($request->all());
        
        auth()->user()->update(['name' => $request->businessName]);
        $provider = Firm::where('user_id', Auth::id())->first();
        if ($provider) {
            $provider->update([
                'user_id'               => Auth::id(),
                'hiringPerson'          => $request->hiringPerson,
                'hiringPersonEmail'     => $request->hiringPersonEmail,
                'hiringPersonPhone'     => $request->hiringPersonPhone,
                'paymentPersonName'     => $request->paymentPersonName,
                'paymentPersonEmail'    => $request->paymentPersonEmail,
                'paymentPersonPhone'    => $request->paymentPersonPhone,
            ]);
            session()->flash('alert-success', 'Your profile has been updated successfully!');
            return redirect()->route('provider.profile');
            exit;
        }
        auth()->user()->firm()->create([
            'user_id'               => Auth::id(),
            'hiringPerson'          => $request->hiringPerson,
            'hiringPersonEmail'     => $request->hiringPersonEmail,
            'hiringPersonPhone'     => $request->hiringPersonPhone,
            'paymentPersonName'     => $request->paymentPersonName,
            'paymentPersonEmail'    => $request->paymentPersonEmail,
            'paymentPersonPhone'    => $request->paymentPersonPhone,
        ]);
        session()->flash('alert-success', 'Your profile has been updated successfully!');
        return redirect()->route('provider.profile');
    }

    public function updateBusiness(Request $request)
    {
        $provider = Firm::where('user_id', Auth::id())->first();
        if ($provider) {
            $provider->update([
                'user_id'               => Auth::id(),
                'businessType'          => $request->type,
                'zip'                   => $request->zip,
                'employees'             => $request->employees,
                'experience'            => $request->experince,
                'specialize'            => is_array($request->experiences) ? implode(',', $request->experiences) : '',
                'about'                 => $request->about,
            ]);
            session()->flash('alert-success', 'Your profile has been updated successfully!');
            return redirect()->route('provider.profile');
            exit;
        }
        auth()->user()->firm()->create([
            'user_id'               => Auth::id(),
            'businessType'          => $request->type,
            'zip'                   => $request->zip,
            'employees'             => $request->employees,
            'experience'            => $request->experince,
            'specialize'            => is_array($request->experiences) ? implode(',', $request->experiences) : '',
            'about'                 => $request->about,
        ]);
        session()->flash('alert-success', 'Your profile has been updated successfully!');
        return redirect()->route('provider.profile');
    }

    public function deleteProfile()
    {
        $user = auth()->user();
        return view('providers.delete-profile', compact('user'));
    }

    public function nurseProfile($username)
    {
        $user     = auth()->user();
        $nurse    = User::with('worker')->where('username', $username)->first();
        return view('providers.nurse-profile', compact('user', 'nurse'));
    }

    public function destroy()
    {
        $user = auth()->user();
        $user->firm()->delete();
        $user->delete();
        Auth::logout();
        return redirect()->route('login');
    }
}
