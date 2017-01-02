<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsFeedPost extends Model
{
    protected $table = 'newsfeed_posts';


    /**
     * Get news feed post user
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }


    /**
     * Get the files included in post
     */
    public function files()
    {
        return $this->hasMany('App\FileUpload');
    }
}
