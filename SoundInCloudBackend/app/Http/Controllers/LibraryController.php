<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FileUpload;
use Illuminate\Support\Facades\Auth;
use App\User;

class LibraryController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show user library
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $files = FileUpload::where('user_id', Auth::id())
                ->orderBy('updated_at', 'desc')->get();
        $users = User::all();

        return view('library', [
            'files' => $files,
            'people' => $users
        ]);
    }
}
