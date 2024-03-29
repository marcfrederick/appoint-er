<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use _HumbugBox69342eed62ce\Nette\Schema\ValidationException;
use App\Http\Requests\SlotCreateRequest;
use App\Location;
use App\Slot;
use DateTime;
use Illuminate\Support\Facades\Log;
use Session;

class SlotController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  Location $location
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create(Location $location)
    {
        $this->authorize('update', $location);
        \Log::info('Create slot for location', ['location' => $location]);
        return response()->view('slot.create', ['location' => $location]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SlotCreateRequest $request
     * @param  \App\Location $location
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(SlotCreateRequest $request, Location $location)
    {
        $this->authorize('update', $location);
        Log::info('Store slot for location', ['location' => $location]);

        $start = DateTime::createFromFormat("Y-m-d\TH:i", sprintf("%sT%s", $request->date, $request->time));
        if ($start === false) {
            Log::error(sprintf("Failed to convert '%sT%s'.", $request->date, $request->time));
            throw new ValidationException("Failed to convert given date/time");
        }

        Log::debug($start->format('Y-m-d H:i:s'));
        Slot::create([
            'start' => $start->format('Y-m-d H:i:s'),
            'duration' => $request->duration,
            'location_id' => $request->location->id,
            'user_id' => $request->user()->id,
        ]);

        Session::push('toasts', 'Slot created successfully!');
        return response()->redirectToRoute('locations.show', $location);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Location $location
     * @param  \App\Slot $slot
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Exception
     */
    public function destroy(Location $location, Slot $slot)
    {
        $this->authorize('update', $location);
        $slot->delete();
        return response()->redirectToRoute('locations.show', $location);
    }
}
