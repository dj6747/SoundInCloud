<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{
    protected $table = 'files';


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


    /**
     * Check if file type is audio
     * @return boolean
     */
    public function isAudioFile() {
        return ($this->mime_type == 'audio/mpeg') || ($this->mime_type == 'audio/ogg') || ($this->mime_type == 'audio/wav');
    }

    
}
