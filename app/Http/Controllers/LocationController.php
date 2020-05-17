<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class LocationController extends Controller
{
    /**
     * Shows location information for the given id.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        return view('location.show', ['location' => Location::findOrFail($id)]);
    }
}
