<?php

namespace App\Http\Controllers;

use App\Location;
use App\User;

class SitemapController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()
            ->view('sitemap.index')
            ->header('Content-Type', 'text/xml');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function locations()
    {
        return response()
            ->view('sitemap.locations', ['locations' => Location::all()])
            ->header('Content-Type', 'text/xml');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function users()
    {
        return response()
            ->view('sitemap.users', ['users' => User::all()])
            ->header('Content-Type', 'text/xml');
    }
}
