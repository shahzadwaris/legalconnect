<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NotificationSetting;

class NotificationsController extends Controller
{
    public function settings()
    {
        $user     =auth()->user() ;
        $settings = NotificationSetting::where('user_id', $user->id)->first();

        return view('nurses.notifications-settings', compact('user', 'settings'));
    }

    public function update(Request $request)
    {
        $user     = auth()->user();
        NotificationSetting::where('user_id', $user->id)->update([
            'email'     => $request->email,
            'marketing' => $request->marketing,
        ]);
        session()->flash('alert-success', 'Your notification settings has been updated!');
        return redirect()->back();
    }

    public function markRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
    }
}
