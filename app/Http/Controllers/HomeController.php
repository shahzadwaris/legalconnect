<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Page;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jobs       = Job::with('provider', 'state')->latest()->take(5)->get();
        $categories = Category::orderBy('id', 'desc')->take(8)->get();
        return view('index', compact('categories', 'jobs'));
    }

    public function faq()
    {
        return view('faq');
    }
    public function about()
    {
        return view('about-us');
    }

    public function termsNurse()
    {
        $page = Page::findOrFail(1);
        return view('terms-conditions-nurse', compact('page'));
    }

    public function termsMP()
    {
        $page = Page::findOrFail(2);
        return view('terms-condition-mp', compact('page'));
    }
}
