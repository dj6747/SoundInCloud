<?php

namespace App\Http\Controllers;

use App\FileUpload;
use App\NewsFeedPost;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminHomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show admin panel
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin-home');
    }

}
