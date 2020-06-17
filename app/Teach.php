<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teach extends Model
{
    /**
     * Get all of the subject's teachers.
     */
    public function teachers()
    {
        return $this->morphMany('App\User', 'subject');
    }
}
