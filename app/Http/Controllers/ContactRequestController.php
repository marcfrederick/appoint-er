<?php

namespace App\Http\Controllers;

use App\ContactRequest;
use App\Http\Requests\ContactRequestRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactRequestController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(ContactRequest::class, 'contactRequest');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->view('contact-request.index', [
            'requests' => ContactRequest::orderBy('updated_at', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('contact-request.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ContactRequestRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ContactRequestRequest $request)
    {
        \Log::info('creating contact request', [$request->input()]);

        ContactRequest::create([
            'title' => $request->input('title'),
            'message' => $request->input('message'),
            'user_id' => $request->user() !== null ? $request->user()->id : null,
        ]);

        Session::push('toasts', trans('contact.message_sent'));
        return response()->redirectTo(RouteServiceProvider::HOME);
    }
}
