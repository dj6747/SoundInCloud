<?php

namespace App\Http\Controllers;

use App\FileUpload;
use App\NewsFeedPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    /**
     * Create newsFeed post
     *
     * @param  Request  $request
     * @return Response
     */
    public function createPost(Request $request) {//TODO: validate
        $text = $request->input('text');
        $files = $request->file('file');
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        $post = new NewsFeedPost();
        $post->user_id = Auth::user()->id;
        $post->text = $text;
        $post->latitude = $latitude;
        $post->longitude = $longitude;
        $post->save();

        $fileUploads = [];
        foreach ($files as $file) {
            $path = $file->store('uploads');
            $mimeType = File::mimeType($path);
            $name = File::getClientOriginalName($path);

            $fileUpload = new FileUpload();
            $fileUpload->user_id = Auth::user()->id;
            $fileUpload->name = $name;
            $fileUpload->mime_type = $mimeType;
            $fileUpload->path = $path;
            $fileUploads[] = $fileUpload;
        }

        $post->files()->saveMany($fileUploads);

        return Response::json([
            'status' => 'ok'
        ]);
    }

}
