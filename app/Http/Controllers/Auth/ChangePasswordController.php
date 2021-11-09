<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('auth.passwords.change', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'oldPassword' => 'required',
            'password'    => 'required|confirmed|min:6',
        ]);
        $user = Auth::user();
        $pass = Hash::make($request->oldPassword);
        if (Hash::check($request->oldPassword, $user->password)) {
            $user->password = $pass;
            $user->save();
            $request->session()->flash('alert-success', 'Password updated successfully!');
            return redirect()->back();
        } else {
            $request->session()->flash('alert-danger', "Old password didn't match!");
            return redirect()->back();
        }
    }
}
