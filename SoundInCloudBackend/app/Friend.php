<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $table = 'friends';

    /**
     * Get file owner
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user2_id');
    }
}
