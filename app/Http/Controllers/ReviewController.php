<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\Log;
use App\Group;

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

    //GET
    public function displayReviewGroup(){
        $groups = Group::orderBy('name')->get();
        return view('review.group.display')->with(["groups"=>$groups]);
    }

    //GET
    public function listReviewGroup(Request $request){
        $group = Group::find($request->group_id);
        $selectedGroup = Group::find($request->group_id);
        $persons = $group->people()->orderBy('people.id')->pluck('people.id')->toArray();
        $data = [];
        foreach($persons as $person){

        }
        dd($persons);
    }

}
