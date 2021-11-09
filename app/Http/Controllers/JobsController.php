<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Job;
use App\Models\Zip;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filters  = $request->all();
        $jobs     = Job::with('provider', 'state')->latest();

        if ($request->has('zip') && !(is_null($request->zip)) && $request->has('distance')) {
            $zip      = Zip::where('code', $request->zip)->select('latitude', 'longitude')->first();
            if ($zip) {
                $list     = DB::select(
                    'SELECT
                    id, (
                        3959 * acos (
                        cos (radians(' . $zip->latitude . '))
                        * cos(radians(latitude))
                        * cos(radians(longitude) - radians(' . $zip->longitude . '))
                        + sin(radians(' . $zip->latitude . '))
                        * sin(radians(latitude) )
                        )
                    ) AS distance
                    FROM jobs
                    HAVING distance <= ' . $request->distance . '
                    ORDER BY distance;'
                );
                $list = collect($list)->pluck('id');
                $jobs->whereIn('id', $list);
            } else {
                if ($request->has('zip') && !(is_null($request->zip))) {
                    $jobs->where('zip', $request->zip);
                }
            }
        }
        if ($request->has('title') && !(is_null($request->title))) {
            $jobs->where('jobTitle', 'LIKE', '%' . $request->title . '%');
        }
        if ($request->has('category') && !(is_null($request->category))) {
            $jobs->where('category', $request->title);
        }

        if ($request->has('type') && !(is_null($request->type))) {
            if (!(in_array('all', $request->type))) {
                $jobs->whereIn('type', $request->type);
            }
        }
        if ($request->has('date') && !(is_null($request->date))) {
            if (in_array('today', $request->date)) {
                $jobs->where('created_at', Carbon::today());
            }
            if (in_array('week', $request->date)) {
                $jobs->where('created_at', '>=', now()->subDays(7));
            }
            if (in_array('year', $request->date)) {
                $jobs->whereMonth('created_at', date('m'));
            }
        }
        $jobs       = $jobs->paginate(8);
        $categories = Category::all();
        return view('jobs', compact('categories', 'jobs', 'filters'));
    }

    public function search(Request $request)
    {
        $filters = $request->all();
        $jobs    = Job::where('status', 'active');
        if ($request->has('title') && !(is_null($request->title))) {
            $jobs->where('jobTitle', 'LIKE', '%' . $request->title . '%');
        }
        if ($request->has('zip') && !(is_null($request->zip))) {
            $jobs->where('zip', $request->zip);
        }
        $jobs       = $jobs->paginate(8);
        $categories = Category::all();
        return view('jobs', compact('jobs', 'categories', 'filters'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $job = Job::with('provider', 'applied', 'state')->where('slug', $slug)->first();
        return view('job-details', compact('job'));
        dd($slug);
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
        //
    }
}

        // // Search for a user based on their city.
        // if ($request->has('city')) {
        //     $jobs->where('city', $request->input('city'));
        // }

        // // Only return users who are assigned
        // // to the given sales manager(s).
        // if ($request->has('managers')) {
        //     $jobs->whereHas('managers', function ($query) use ($request) {
        //         $query->whereIn('managers.name', $request->input('managers'));
        //     });
        // }

        // // Has an 'event' parameter been provided?
        // if ($request->has('event')) {
        //     // Only return users who have
        //     // been invited to the event.
        //     $jobs->whereHas('rsvp.event', function ($query) use ($request) {
        //         $query->where('event.slug', $request->input('event'));
        //     });

        //     // Only return users who have responded
        //     // to the invitation (with any type of
        //     // response).
        //     if ($request->has('responded')) {
        //         $jobs->whereHas('rsvp', function ($query) use ($request) {
        //             $query->whereNotNull('responded_at');
        //         });
        //     }

        //     // Only return users who have responded
        //     // to the invitation with a specific
        //     // response.
        //     if ($request->has('response')) {
        //         $user->whereHas('rsvp', function ($query) use ($request) {
        //             $query->where('response', 'I will be attending');
        //         });
        //     }
        // }
