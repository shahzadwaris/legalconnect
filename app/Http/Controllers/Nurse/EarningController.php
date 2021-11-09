<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;

class EarningController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('nurses.earnings', compact('user'));
    }
}
