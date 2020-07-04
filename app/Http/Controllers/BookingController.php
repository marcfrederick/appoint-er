<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Location;
use App\Providers\RouteServiceProvider;
use App\Slot;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  Location $location
     * @param  Slot $slot
     * @return \Illuminate\View\View
     */
    public function create(Location $location, Slot $slot)
    {
        return view('booking.create', ['location' => $location, 'slot' => $slot]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Location $location
     * @param  Slot $slot
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Location $location, Slot $slot)
    {
        Booking::create([
            'slot_id' => $slot->id,
            'user_id' => $request->user()->id,
        ]);
        return redirect(route('locations.show', $location));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking $booking
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect(RouteServiceProvider::HOME);
    }
}
