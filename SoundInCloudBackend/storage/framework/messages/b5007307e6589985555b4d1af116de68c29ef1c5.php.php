<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show user profile
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile');
    }
}
