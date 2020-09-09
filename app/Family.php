<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function users() {
        return $this->hasMany('App\User');
    }

    public function stores() {
        return $this->hasMany('App\Store');
    }

    public function categories() {
        return $this->hasMany('App\Category');
    }

    public function owner() {
        return $this->hasOne('App\User', 'owner_id', 'id');
    }
}
