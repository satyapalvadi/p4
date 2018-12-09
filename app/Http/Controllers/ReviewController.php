<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //
    public function person(){
        return view('review.person');
    }

    //
    public function group(){
        return view('review.group');
    }
}
