<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mobile_phones extends Model
{
    use SoftDeletes;
    public function user()
    {
        return $this->belongsToMany('App\User');
    }

    protected $fillable = ['phone', 'user'];
}
