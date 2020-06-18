<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Starred extends Model
{
    /**
     * The principal user.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
