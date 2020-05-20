<?php
declare(strict_types=1);

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use App\Location;
use Illuminate\Support\Facades\Request;

class ListController extends Controller
{
    /**
     * @param \Illuminate\Support\Facades\Request $request
     * @return \Illuminate\View\View
     */
    protected function search(Request $request)
    {
        $query = $request::input('query');
        $locations = Location::where('title', 'LIKE', "%{$query}%")
            ->paginate();

        return view('location.list', ['locations' => $locations]);
    }

    /**
     * @return \Illuminate\View\View
     */
    protected function show()
    {
        $locations = Location::orderBy('title')->paginate();

        return view('location.list', ['locations' => $locations]);
    }
}
