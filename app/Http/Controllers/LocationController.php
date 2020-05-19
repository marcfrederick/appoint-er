<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Location;

class LocationController extends Controller
{
    /**
     * Shows location information for the given id.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function single($id)
    {
        return view('location.single', ['location' => Location::findOrFail($id)]);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function all()
    {
        return view('location.all', ['locations' => Location::orderBy('updated_at', 'desc')->get()]);
    }
}
