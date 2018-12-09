<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupController extends Controller
{
    // GET for Journal Homepage
    public function view(){
        return view('group.view');
    }

    public function create(){
        return view('group.create');
    }

    public function edit(){
        return view('group.edit');
    }
}
