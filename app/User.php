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
        'name', 'email', 'password', 'username', 'phone'
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
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Phones Relationship
    public function phoneNumbers()
    {
        return $this->hasMany('App\Mobile_phones','user');
    }

    // My Contacts Relationship
    public function contacts()
    {
        return $this->belongsToMany('App\User', 'contacts', 'user_id', 'contact_id');
    }

    // My Contacts Inverse Relationship
    public function theUsers()
    {
        return $this->belongsToMany('App\User', 'contacts', 'contact_id', 'user_id');
    }
}
