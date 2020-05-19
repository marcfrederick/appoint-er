<?php
declare(strict_types=1);

namespace App\Http\Controllers\Location;

use App\Address;
use App\Http\Controllers\Controller;
use App\Location;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class CreateController extends Controller
{
    /** @var string */
    protected $redirectTo = '/';

    /**
     * Show the location creation form
     *
     * @return \Illuminate\View\View
     */
    protected function showCreationForm()
    {
        return view('location.create');
    }

    /**
     * Creates a new location instance.
     *
     * @param \Illuminate\Support\Facades\Request $request
     * @return \Illuminate\Routing\Redirector
     */
    protected function create(Request $request)
    {
        $data = $request::all();
        $this->validator($data)->validate();

        Location::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'address_id' => Address::create([
                'street' => $data['street'],
                'postcode' => $data['postcode'],
                'city' => $data['city'],
                'country' => $data['country'],
            ])->id,
            'user_id' => $request::user()->id,
        ]);

        return redirect($this->redirectTo);
    }

    /**
     * Retrieves a validator for the incoming data.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator($data)
    {
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'street' => ['required', 'string'],
            'postcode' => ['required', 'string'],
            'city' => ['required', 'string'],
            'country' => ['required', 'string', 'size:3'],
        ]);
    }
}
