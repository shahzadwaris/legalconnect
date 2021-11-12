<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Nurse;
use App\Models\Provider;
use App\Models\NotificationSetting;
use App\Http\Controllers\Controller;
use App\Models\Firm;
use App\Models\Worker;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Notifications\WelcomeMPNotification;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Notifications\WelcomeNurseNotification;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function nurseRegister()
    {
        return view('auth.worker');
    }

    public function medicalProviderRegister()
    {
        return view('auth.medical-provider-register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username'    => ['required', 'string', 'max:255', 'min:4', 'unique:users,username'],
            'email'       => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password'    => ['required', 'string', 'min:8', Password::min(8)->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(), ],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user =  User::create([
            'username'     => $data['username'],
            'name'         => $data['name'],
            'status'       => 'active',
            'type'         => $data['type'],
            'email'        => $data['email'],
            'password'     => Hash::make($data['password']),
        ]);
        if ($user->type == 1) {
            $user->notify(new WelcomeNurseNotification($user));
            $this->createNurse($user->id);
        }
        if ($user->type == 2) {
            $user->notify(new WelcomeMPNotification($user));
            $this->createProvider($user->id);
        }
        NotificationSetting::create([
            'user_id'   => $user->id,
            'email'     => 1,
            'marketing' => 1,
        ]);

        return $user;
    }

    public function createNurse($id)
    {
        Worker::create(['user_id' => $id]);
    }

    public function createProvider($id)
    {
        Firm::create(['user_id' => $id]);
    }

    protected function redirectTo()
    {
        if (auth()->user()->type == 1) {
            return route('nurse.index');
        }
        if (auth()->user()->type == 2) {
            return route('provider.index');
        }
        if (auth()->user()->type == 3) {
            return route('admin.index');
        }
    }
}
