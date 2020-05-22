<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\User;

class ProfileController extends Controller
{
    /**
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        return view('profile', ['user' => User::findOrFail($id)]);
    }
}
