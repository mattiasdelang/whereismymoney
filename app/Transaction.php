<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $guarded = [];

    public function user() {
        return $this->hasOne('App\User');
    }

    public function family() {
        return $this->hasOne('App\Family');
    }

    public function category() {
        return $this->hasOne('App\Category');
    }

    public function store() {
        return $this->hasOne('App\Store');
    }
}
