<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Category;

class IndexController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    protected function show()
    {
        return response()->view('index', [
            'categories' => Category::all()
        ]);
    }
}
