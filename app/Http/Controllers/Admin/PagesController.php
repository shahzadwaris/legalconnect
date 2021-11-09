<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function nurseTerms()
    {
        $page = Page::where('id', 1)->first();
        return view('admin.pages.edit', compact('page'));
    }

    public function mpTerms()
    {
        $page = Page::where('id', 2)->first();
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request)
    {
        Page::findOrFail($request->id)->update(['contents' => $request->contents]);
        session()->flash('alert-success', 'Page has been updated!');
        return redirect()->back();
    }
}
