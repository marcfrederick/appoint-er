<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Location;

class IndexController extends Controller
{
    /**
     * @var int The number of listings to display on the index page.
     */
    protected $numberOfIndexListings = 15;

    /**
     * @return \Illuminate\View\View
     */
    protected function show()
    {
        $locations = Location::orderBy('updated_at', 'desc')
            ->take($this->numberOfIndexListings)
            ->get();

        return view('index', ['locations' => $locations]);
    }
}
