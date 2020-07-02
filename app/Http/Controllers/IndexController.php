<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Category;
use App\Location;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    /**
     * @var int The number of listings to display on the index page.
     */
    protected $numberOfIndexListings = 15;

    /**
     * @var Location
     */
    protected $location;

    public function __construct(Location $location)
    {
        $this->location = $location;
    }

    /**
     * @return \Illuminate\View\View
     */
    protected function show()
    {
        return view('index', [
            'categories' => Category::all()
        ]);
    }
}
