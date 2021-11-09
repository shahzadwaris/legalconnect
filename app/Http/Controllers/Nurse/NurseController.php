<?php

namespace App\Http\Controllers\Nurse;

use App\Models\User;
use App\Models\Nurse;
use App\Models\Category;
use Stripe\StripeClient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Nurse\UpdateMedicalProviderRequest;
use App\Http\Requests\Nurse\UpdatePersonalDetailsRequest;

class NurseController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('nurses.index', compact('user'));
    }

    public function profile()
    {
        $user       = User::with('worker')->where('id', auth()->user()->id)->first();
        $categories = Category::all();
        return view('nurses.profile', compact('user', 'categories'));
    }

    public function updatePersonalDetails(UpdatePersonalDetailsRequest $request)
    {
        auth()->user()->update(['name' => $request->name]);
        $nurse = Nurse::where('user_id', Auth::id())->first();
        if ($nurse) {
            $nurse->update([
                'user_id'      => Auth::id(),
                'dob'          => $request->dob,
                'address'      => $request->address,
                'insurance'    => $request->insurance,
                'category_id'  => $request->category,
            ]);
            session()->flash('alert-success', 'Your profile has been updated successfully!');
            return redirect()->route('nurse.profile');
            exit;
        }
        auth()->user()->nurse()->create([
            'user_id'        => Auth::id(),
            'dob'            => $request->dob,
            'address'        => $request->address,
            'category_id'    => $request->category,
        ]);
        session()->flash('alert-success', 'Your profile has been updated successfully!');
        return redirect()->route('nurse.profile');
    }

    public function updateMedicalProviderDetails(UpdateMedicalProviderRequest $request)
    {
        $nurse = Nurse::where('user_id', Auth::id())->first();
        if ($nurse) {
            $nurse->update([
                'user_id'             => Auth::id(),
                'zip'                 => $request->zip,
                'salary'              => $request->salary,
                'travel'              => $request->travel,
                'experienceInYears'   => $request->years,
                'experiences'         => is_array($request->experiences) ? implode(',', $request->experiences) : '',
                'about'               => $request->about,
            ]);
            session()->flash('alert-success', 'Your profile has been updated successfully!');
            return redirect()->route('nurse.profile');
            exit;
        }
        auth()->user()->nurse()->create([
            'user_id'             => Auth::id(),
            'zip'                 => $request->zip,
            'salary'              => $request->salary,
            'travel'              => $request->travel,
            'experienceInYears'   => $request->years,
            'experiences'         => is_array($request->experiences) ? implode(',', $request->experiences) : '',
            'about'               => $request->about,
        ]);
        session()->flash('alert-success', 'Your profile has been updated successfully!');
        return redirect()->route('nurse.profile');
    }

    public function providerProfile($username)
    {
        $user     = auth()->user();
        $provider = User::with('provider')->where('username', $username)->first();
        return view('nurses.provider-profile', compact('user', 'provider'));
    }

    public function deleteProfile()
    {
        $user = auth()->user();
        return view('nurses.delete-profile', compact('user'));
    }

    public function destroy()
    {
        $user = auth()->user();
        $user->nurse()->delete();
        $user->delete();
        Auth::logout();
        return redirect()->route('login');
    }

    public function addBank(Request $request)
    {
        // dd($request->ip());
        // dd($request->all());
        $nurse  = Nurse::where('user_id', Auth::id())->first();
        $user   = Auth::user();
        $stripe = new StripeClient(
            config('services.stripe.secret')
        );
        $account = $stripe->accounts->create([
            'type'         => 'custom',
            'country'      => 'US',
            'email'        => $user->email,
            'capabilities' => [
                'transfers'     => ['requested' => true],
            ],
            [
                'tos_acceptance' => [
                    'date' => time(),
                    'ip'   => $request->ip(), // Assumes you're not using a proxy
                ],
            ],
            'business_profile' => [
                'url' => 'https://www.medconnectus.com/',
            ],
            'business_type' => 'individual',
            'individual'    => [
                'first_name'=> $request->firstName,
                'last_name' => $request->lastName,
                'phone'     => $request->phone,
                'gender'    => $request->gender,
                'dob'       => [
                    'day'   => date('d', strtotime($nurse->dob)),
                    'month' => date('m', strtotime($nurse->dob)),
                    'year'  => date('Y', strtotime($nurse->dob)),
                ],
                'ssn_last_4' => substr($request->ssn, -4),
            ],
        ]);
        $attachBank = $stripe->accounts->createExternalAccount(
            $account->id,
            [
                'external_account' => $request->stripeToken,
            ]
        );
        $nurse->update([
            'phone'                    => $request->phone,
            'accountHolderFirstName'   => $request->firstName,
            'accountHolderLastName'    => $request->lastName,
            'gender'                   => $request->gender,
            'bankName'                 => $request->bname,
            'rountingNumber'           => $request->rnumber,
            'accountNumber'            => $request->anumber,
        ]);
        $user->update([
            'stripeAccount'     => $account->id,
            'stripeAccountBank' => $attachBank->id,
        ]);
        session()->flash('alert-success', 'Your bank account has been added successfully!');
        return redirect()->route('nurse.profile');
    }
}
