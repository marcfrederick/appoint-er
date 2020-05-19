<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use App\Location;

class DetailController extends Controller
{
    /**
     * Shows location information for the given id.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        return view('location.detail', ['location' => Location::findOrFail($id)]);
    }
}
