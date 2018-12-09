<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function view(){
        return view('person.view');
    }

    public function create(){
        return view('person.create');
    }

    public function edit(){
        return view('person.edit');
    }
}
