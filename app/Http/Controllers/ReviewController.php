<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\Log;

class ReviewController extends Controller
{
    //GET
    public function displayReviewPerson(){
        $persons = Person::orderBy('first_name')->get();
        return view('review.person.display')->with(["persons"=>$persons]);
    }

    //GET
    public function listReviewPerson(Request $request){
        $logs = Log::where('person_id','=',$request->person_id)->orderBy('activity_date')->get();
        $persons = Person::orderBy('first_name')->get();
        $selectedPerson = Person::find($request->person_id);
        return view('review.person.list')->with(["persons"=>$persons, "logs"=>$logs, "selectedPerson"=>$selectedPerson]);
    }
}
