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
    public function single($id)
    {
        return view('location.single', ['location' => Location::findOrFail($id)]);
    }

    public function all()
    {
        return view('location.all', ['locations' => Location::orderBy('updated_at', 'desc')->get()]);
    }
}
