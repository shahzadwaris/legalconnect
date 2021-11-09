<?php

namespace App\Http\Controllers\Provider;

use App\Models\Connection;
use App\Http\Controllers\Controller;
use App\Notifications\NurseJobCompleted;
use App\Notifications\NurseConnectionHired;
use App\Notifications\NurseConnectionAccepted;

class NursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function connectionsRequest()
    {
        $user     = auth()->user();
        $requests = Connection::with('job', 'nurse', 'nurse.nurse')->where(['provider_id' => $user->id, 'status'=>'PENDING'])->get();
        return view('providers.nurses.connectionRequest', compact('user', 'requests'));
    }

    public function connectionsAccept($id)
    {
        $connection = Connection::findOrFail($id);
        $connection->update(['status' => 'ACCEPTED']);
        $connection->nurse->notify(new NurseConnectionAccepted($connection->provider));
        session()->flash('alert-success', 'You have accepted the request');
        return redirect()->route('provider.nurses.connections');
    }

    public function connectionsReject($id)
    {
        $connection = Connection::findOrFail($id);
        $connection->update(['status' => 'DECLINED']);
        $connection->nurse->notify(new NurseConnectionHired($connection->provider));
        session()->flash('alert-warning', 'You have delined the request');
        return redirect()->route('provider.nurses.declined');
    }

    public function declined()
    {
        $user     = auth()->user();
        $requests = Connection::with('job', 'nurse', 'nurse.nurse')->where(['provider_id' => $user->id, 'status'=>'DECLINED'])->get();
        return view('providers.nurses.declined', compact('user', 'requests'));
    }

    public function connections()
    {
        $user     = auth()->user();
        $requests = Connection::with('job', 'nurse', 'nurse.nurse')->where(['provider_id' => $user->id, 'status'=>'ACCEPTED'])->get();
        return view('providers.nurses.connections', compact('user', 'requests'));
    }

    public function hired()
    {
        $user     = auth()->user();
        $hireds   = Connection::with('job', 'nurse', 'nurse.nurse')->where(['provider_id' => $user->id, 'status'=>'HIRED'])->orWhere('status', 'JOB COMPLETED')->get();
        return view('providers.nurses.hired', compact('user', 'hireds'));
    }

    public function markHired($id)
    {
        $connection = Connection::findOrFail($id);
        $connection->update(['status' => 'HIRED']);
        $connection->nurse->notify(new NurseConnectionHired($connection->provider));
        session()->flash('alert-warning', 'You have hired the nurse successfully!');
        return redirect()->route('provider.nurses.hired');
    }

    public function markCompleted($id)
    {
        Connection::findOrFail($id)->update(['status' => 'JOB COMPLETED']);
        $connection = Connection::findOrFail($id);
        $connection->update(['status' => 'COMPLETED']);
        $connection->nurse->notify(new NurseJobCompleted($connection->provider));

        session()->flash('alert-warning', 'You have hired the nurse successfully!');
        return redirect()->route('provider.nurses.hired');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
