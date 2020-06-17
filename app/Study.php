<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    /**
     * Get all of the subjects's students.
     */
    public function students()
    {
        return $this->morphMany('App\User', 'subject');
    }
}
