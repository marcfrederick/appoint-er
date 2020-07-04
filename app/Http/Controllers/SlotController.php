<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Location;
use App\Slot;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Session;

class SlotController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Location::class, 'location');
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  Location $location
     * @return \Illuminate\View\View
     */
    public function create(Location $location)
    {
        \Log::info('Create slot for location', ['location' => $location]);
        return view('slot.create', ['location' => $location]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Location $location
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Location $location)
    {
        Log::info('Store slot for location', ['location' => $location]);
        $request->validate([
            'date' => 'required|date_format:Y-m-d|after_or_equal:now',
            'time' => 'required|date_format:H:i',
            'duration' => 'required|integer',
        ]);

        $start = DateTime::createFromFormat("Y-m-d\TH:i", sprintf("%sT%s", $request->date, $request->time));
        Log::debug($start->format('Y-m-d H:i:s'));
        Slot::create([
            'start' => $start->format('Y-m-d H:i:s'),
            'duration' => $request->duration,
            'location_id' => $request->location->id,
            'user_id' => \Auth::user()->id,
        ]);

        Session::push('toasts', 'Slot created successfully!');
        return redirect(route('locations.show', $location));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slot $slot
     * @return void
     * @throws \Exception
     */
    public function destroy(Slot $slot)
    {
        $slot->delete();
    }
}