<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Address;
use App\Location;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

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

    /**
     * @return \Illuminate\Routing\Redirector
     */
    public function create()
    {
        $data = Request::all();

        $address = Address::create([
            'street' => $data['street'],
            'postcode' => $data['postcode'],
            'city' => $data['city'],
            'country' => $data['country'],
        ]);

        Location::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'address_id' => $address->id,
            'user_id' => Auth::id(),
        ]);

        return redirect('/');
    }
}
