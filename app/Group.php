<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function people() {
        return $this->belongsToMany('App\Person')->withTimestamps();
    }

    public static function getForDropdown() {
        return self::orderBy('name')->select(['id', 'name'])->get();
    }
}
