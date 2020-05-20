<?php
declare(strict_types=1);

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use App\Location;

class ListController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    protected function show()
    {
        $locations = Location::orderBy('title')->paginate();

        return view('location.list', ['locations' => $locations]);
    }
}
