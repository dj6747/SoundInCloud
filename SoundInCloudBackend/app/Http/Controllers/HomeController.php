<?php

namespace App\Http\Controllers;

use App\FileUpload;
use App\NewsFeedPost;
use App\PostLike;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $news = NewsFeedPost::orderBy('updated_at', 'desc')->get();

        return view('home', [
                'news' => $news
            ]
        );
    }


    /**
     * Create newsFeed post
     *
     * @param  Request  $request
     * @return Response
     */
    public function createPost(Request $request)
    {
        $this->validate($request, [
            'text' => 'required',
            'files' => 'required',
        ]);

        $text = $request->input('text');
        $files = $request->file('files');
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        $post = new NewsFeedPost();
        $post->user_id = Auth::id();
        $post->text = $text;
        $post->latitude = $latitude;
        $post->longitude = $longitude;
        $post->save();

        $fileUploads = [];
        foreach ($files as $file) {
            $path = $file->store('uploads');
            Storage::setVisibility($path, 'public');
            $mimeType = Storage::mimeType($path);
            $name = $file->getClientOriginalName($path);

            $fileUpload = new FileUpload();
            $fileUpload->user_id = Auth::id();
            $fileUpload->name = $name;
            $fileUpload->mime_type = $mimeType;
            $fileUpload->path = $path;
            $fileUploads[] = $fileUpload;
        }

        $post->files()->saveMany($fileUploads);

        return redirect()->route('home');
    }



    /**
     * Like post
     *
     * @param  Request  $request
     * @return Response
     */
    public function likePost(Request $request)
    {
        $postId = $request->input('post_id');

        $postLike = PostLike::where('user_id', Auth::id())->where('newsfeed_post_id', $postId)->first();

        if ($postLike) {
            $postLike->delete();
        } else {
            $postLike = new PostLike();
            $postLike->user_id = Auth::id();
            $postLike->newsfeed_post_id = $postId;
            $postLike->save();
        }

        return redirect()->route('home');
    }


}
