<?php
declare(strict_types=1);

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use App\Location;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Gate;

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

    /**
     * @param \App\Location $location
     * @return \Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function delete($location_id)
    {
        $location = Location::findOrFail($location_id);
        Gate::authorize('manage-location', $location);
        $location->delete();

        return redirect(RouteServiceProvider::HOME);
    }
}
