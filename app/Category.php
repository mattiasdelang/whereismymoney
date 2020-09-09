<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $guarded = [];

    public function family() {
        return $this->belongsTo('App\Family', 'family_id');
    }
}
