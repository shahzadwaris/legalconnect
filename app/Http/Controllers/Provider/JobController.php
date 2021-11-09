<?php

namespace App\Http\Controllers\Provider;

use App\Models\Job;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $jobs = $user->jobs;
        return view('providers.jobs', compact('user', 'jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user       = auth()->user();
        $categories = Category::all();
        return view('providers.create-job', compact('user', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        Job::create([
            'user_id'                    => Auth::id(),
            'jobTitle'                   => $request->title,
            'slug'                       => Str::slug($request->title),
            'category'                   => $request->category,
            'pay_type'                   => $request->pay_type,
            'salary'                     => $request->pay,
            'zip'                        => $request->zip,
            'type'                       => $request->type,
            'jobLength'                  => $request->length,
            'specialties'                => is_array($request->specialties) ? implode(',', $request->specialties) : '',
            'shiftHours'                 => $request->hours,
            'requirements'               => $request->requirements,
            'about'                      => $request->more,
            'status'                     => 'active',
        ]);
        session()->flash('alert-success', 'Your Job has been created successfully!');
        return redirect()->route('provider.job.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $user       = auth()->user();
        $job        = Job::findOrFail($id);
        return view('providers.edit-job', compact('user', 'job', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        Job::findOrFail($id)->update([
            'user_id'                    => Auth::id(),
            'jobTitle'                   => $request->title,
            'category'                   => $request->category,
            'pay_type'                   => $request->pay_type,
            'salary'                     => $request->pay,
            'zip'                        => $request->zip,
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Job::findOrFail($id)->update(['status' =>'deactivated']);
        session()->flash('alert-warning', 'Job has ');
        return redirect()->back();
    }
}
