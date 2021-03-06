<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    /**
     * Get the user linked to the attendance.
     */
    public function student()
    {
        return $this->belongsTo('App\User');
    }
}
