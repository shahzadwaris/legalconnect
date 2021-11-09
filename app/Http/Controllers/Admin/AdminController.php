<?php

namespace App\Http\Controllers\Admin;

use App\Models\Job;
use App\Models\User;
use App\Models\Connection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAdminRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Ui\Presets\React;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function loginAttempt(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if (Auth::attempt([$fieldType => $input['username'], 'password' => $input['password']])) {
            return redirect()->route('admin.index');
            exit;
        } else {
            session()->flash('alert-danger', 'Username or Password are incorrect!');
            return redirect()->back();
        }
    }

    public function index()
    {
        $nurses      = User::where('type', 1)->count();
        $providers   = User::where('type', 2)->count();
        $activeJobs  = Connection::where('status', 'HIRED')->count();
        $jobs        = Job::count();
        return view('admin.index', compact('providers', 'nurses', 'activeJobs', 'jobs'));
    }
    public function create()
    {
        return view('admin.admin.create');
    }

    public function store(CreateAdminRequest $request)
    {
        User::create([
            'name'     => $request->name,
            'username'     => $request->username,
            'status'       => 'active',
            'type'         => 3,
            'email'        => $request->email,
            'password'     => Hash::make($request->password),
        ]);
        session()->flash('alert-success', 'Admin has been created!');
        return redirect()->route('admin.show');
    }
    public function show()
    {
        $admins = User::where('type', 3)->latest()->get();
        return view('admin.admin.index', compact('admins'));
    }
    public function edit($id)
    {
        $admin = User::findOrFail($id);
        return view('admin.admin.edit', compact('admin'));
    }
    public function update(Request $request, $id)
    {
        User::findOrFail($id)->update([
            'name'         => $request->name,
            'username'     => $request->username,
            'status'       => 'active',
            'type'         => 3,
            'email'        => $request->email,
        ]);
        session()->flash('alert-success', 'Admin has been updated!');
        return redirect()->route('admin.show');
    }
    public function changePassword($id)
    {
        $admin = User::findOrFail($id);
        return view('admin.admin.change-password', compact('admin'));
    }
    public function updatePassword(Request $request, $id)
    {
        User::findOrFail($id)->update([
            'password'     => Hash::make($request->password),
        ]);
        session()->flash('alert-success', 'Admin password has been updated!');
        return redirect()->route('admin.show');
    }
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        session()->flash('alert-warning', 'Admin has been deleted!');
        return redirect()->back();
    }
}
