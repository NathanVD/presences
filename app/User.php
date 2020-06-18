<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname','lastname','email','password','img_path','phone','adress_road',
        'adress_commune','domain_id','domain_type','confirmed'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    /**
     * The roles of the user.
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    /**
     * The principal user.
     */
    public function starred()
    {
        return $this->hasOne('App\Starred');
    }

    /**
     * Get the attendances from the user.
     */
    public function attendances()
    {
        return $this->hasMany('App\Attendance');
    }

    /**
     * Get the owning domain model.
     */
    public function domain()
    {
        return $this->morphTo();
    }

    /**
     * Get the classroom associated with the user.
     */
    public function classroom()
    {
        return $this->belongsTo('App\Classroom');
    }
    /**
     * Verify the roles of the user.
     */
    public function isAdmin() {
        return $this->roles()->where('name', 'Administrateur')->exists();
    }
    public function isWebmaster() {
        return ($this->roles()->where('name', 'Administrateur')->exists() || $this->roles()->where('name', 'Webmaster')->exists());
    }
    public function isProf() {
        return ($this->roles()->where('name', 'Administrateur')->exists() || $this->roles()->where('name', 'Webmaster')->exists() || $this->roles()->where('name', 'Professeur')->exists());
    }
    public function isStudent() {
        return ($this->roles()->where('name', 'Administrateur')->exists() || $this->roles()->where('name', 'Webmaster')->exists() || $this->roles()->where('name', 'Professeur')->exists() || $this->roles()->where('name', 'Étudiant')->exists());
    }
}
