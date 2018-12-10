<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    public function groups() {
        return $this->belongsToMany('App\Group')->withTimestamps();
    }
}
