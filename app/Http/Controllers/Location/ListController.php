<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use App\Location;

class ListController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    protected function show()
    {
        return view('location.list', ['locations' => Location::orderBy('title')->get()]);
    }
}
