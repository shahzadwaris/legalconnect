<?php

namespace App\Http\Controllers\Admin;

use App\Models\Job;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Zip;

class JobsController extends Controller
{
    public function index()
    {
        $jobs = Job::with('provider', 'categoryDetails')->latest()->get();
        return view('admin.jobs', compact('jobs'));
    }

    public function create()
    {
        $categories = Category::all();
        $providers  = User::where(['type' => 2, 'status' => 'active'])->get();
        return view('admin.jobs.create', compact('providers', 'categories'));
    }

    public function edit($id)
    {
        $job        = Job::findOrFail($id);
        $categories = Category::all();
        return view('admin.jobs.edit', compact('job', 'categories'));
    }

    public function update(Request $request, $id)
    {
        Job::findOrFail($id)->update([
            'jobTitle'                   => $request->title,
            'salary'                     => $request->pay,
            'pay_type'                   => $request->pay_type,
            'category'                   => $request->category,
            'zip'                        => $request->zip,
            'slug'                       => Str::slug($request->title),
            'type'                       => $request->type,
            'jobLength'                  => $request->length,
            'specialties'                => is_array($request->specialties) ? implode(',', $request->specialties) : '',
            'shiftHours'                 => $request->hours,
            'requirements'               => $request->requirements,
            'about'                      => $request->more,
            'status'                     => 'active',
        ]);
        session()->flash('alert-success', 'Your Job has been updated successfully!');
        return redirect()->back();
    }

    public function store(Request $request)
    {
        $lat = 99.9999;
        $long = 99.9999;
        $zip = Zip::where('code', $request->zip)->first();
        Job::create([
            'user_id'                    => $request->provider,
            'jobTitle'                   => $request->title,
            'slug'                       => Str::slug($request->title),
            'pay_type'                   => $request->pay_type,
            'category'                   => $request->category,
            'salary'                     => $request->pay,
            'zip'                        => $request->zip,
            'latitude'                   => $zip->latitude ?? $lat,
            'longitude'                  => $zip->longitude ?? $long,
            'type'                       => $request->type,
            'jobLength'                  => $request->length,
            'specialties'                => is_array($request->specialties) ? implode(',', $request->specialties) : '',
            'shiftHours'                 => $request->hours,
            'requirements'               => $request->requirements,
            'about'                      => $request->more,
            'status'                     => 'active',
        ]);
        session()->flash('alert-success', 'Your Job has been created successfully!');
        return redirect()->route('admin.jobs.index');
    }

    public function destroy($id)
    {
        Job::findOrFail($id)->delete();
        session()->flash('alert-warning', 'Job has been deleted successfully!');
        return redirect()->back();
    }
}
