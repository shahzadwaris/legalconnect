<?php
namespace App\Http\Controllers\Nurse;

use App\Models\User;
use App\Models\Connection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\MDJobRequestNotification;

class ApplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user    = auth()->user();
        $applied = Connection::with('job', 'provider')->where(['nurse_id' => $user->id, 'status' => 'PENDING'])->get();
        return view('nurses.jobs.applied', compact('user', 'applied'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function connection()
    {
        $user    = auth()->user();
        $applied = Connection::with('job', 'provider')->where(['nurse_id' => $user->id, 'status' => 'ACCEPTED'])->get();
        return view('nurses.jobs.connections', compact('user', 'applied'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($jobID, $providerID)
    {
        // dd($jobID);
        $user = auth()->user();
        Connection::create([
            'job_id'      => $jobID,
            'nurse_id'    => $user->id,
            'provider_id' => $providerID,
            'status'      => 'PENDING',
        ]);
        User::findOrFail($providerID)->notify(new MDJobRequestNotification($user));
        session()->flash('alert-success', 'Job application has been submitted!');
        return redirect()->route('apply.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Connection::findOrFail($id)->delete();
        session()->flash('alert-success', 'Application revoked successfully!');
        return redirect()->back();
    }
}
