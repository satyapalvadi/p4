<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JournalController extends Controller
{
    // GET for Journal Homepage
    public function index(){
        return view('journal.index');
    }
}
