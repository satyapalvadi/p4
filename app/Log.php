<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = ['person_id','weight', 'bmr', 'calories_burned', 'activity', 'activity_date'];
}
