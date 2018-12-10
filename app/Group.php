<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function persons() {
        return $this->belongsToMany('App\Person')->withTimestamps();
    }
}
