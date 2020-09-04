<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    public function family() {
        return $this->belongsTo('App\Family', 'family_id');
    }
}
