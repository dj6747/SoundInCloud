<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostLike extends Model
{
    protected $table = 'posts_likes';


    /**
     * Get file owner
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }


    /**
     * Get the post that owns the file.
     */
    public function post()
    {
        return $this->belongsTo('App\NewsFeedPost');
    }
}
