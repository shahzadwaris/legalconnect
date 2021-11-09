<?php

namespace App\Http\Controllers\Nurse;

use App\Models\Job;
use App\Models\Connection;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
    public function index()
    {
        $user      = auth()->user();
        $applied   = Connection::where('nurse_id', $user->id)->get()->pluck('job_id')->toArray();
        $applied   = Arr::flatten($applied);
        if (count($applied) > 1) {
            $jobs    = Job::whereIn('id', '!=', )->get();
            dd($jobs);
        } else {
            $jobs    = Job::all();
        }
        return view('nurses.jobs', compact('user', 'jobs'));
    }

    public function search(Request $request)
    {
        $user = auth()->user();
        $zip  = $request->zip;
        $jobs = Job::where('zip', $request->zip)->get();
        return view('nurses.jobs', compact('user', 'jobs', 'zip'));
    }
}
