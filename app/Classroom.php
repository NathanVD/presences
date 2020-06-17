<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    /**
     * Get the users associated with the classroom.
     */
    public function phone()
    {
        return $this->hasMany('App\User');
    }
}
