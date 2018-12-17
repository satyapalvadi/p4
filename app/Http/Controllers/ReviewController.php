<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Person;
use App\Log;
use App\Group;

class ReviewController extends Controller
{
    //GET to display form to select a person to review
    //GET review/person/display
    public function displayReviewPerson()
    {
        $persons = Person::orderBy('first_name')->get();

        return view('review.person.display')->with(["persons" => $persons]);
    }

    //Display results
    //GET review/person/list
    public function listReviewPerson(Request $request)
    {
        $logs = Log::where('person_id', '=', $request->person_id)->orderBy('activity_date')->get();
        $persons = Person::orderBy('first_name')->get();
        $selectedPerson = Person::find($request->person_id);

        return view('review.person.list')->with(["persons" => $persons, "logs" => $logs, "selectedPerson" => $selectedPerson]);
    }

    //GET to display form to select a group to review
    //GET review/group/display
    public function displayReviewGroup()
    {
        $groups = Group::orderBy('name')->get();

        return view('review.group.display')->with(["groups" => $groups]);
    }

    //Display results
    //GET review/group/list
    public function listReviewGroup(Request $request)
    {
        $groups = Group::orderBy('name')->get();

        //retrieve selected group info
        $selectedGroup = Group::find($request->group_id);
        $selectedReviewCategory = $request->Review_Category;
        $selectedDays = $request->Days;

        //get a list of all people present in the selected group
        $persons = $selectedGroup->people()->orderBy('people.id')->select("people.id", "first_name", "last_name")->get()
            ->toArray();
        $personIds = $selectedGroup->people()->orderBy('people.id')->pluck("people.id")->toArray();

        //get logs related to all people present in the group.
        $logs = Log::whereIn('person_id', $personIds)->orderBy('activity_date', 'desc')->orderBy('person_id')->get();
        $data = [];

        //pivot data for display
        //data | p1's selected review attribute | p2's selected review attribute | p3's selected review attribute | .... etc
        for ($i = 0; $i < $selectedDays; $i++) {
            $day = Carbon::today()->subDays($i)->toDateString();
            $data[$i]['date'] = $day;
            foreach ($personIds as $personId) {
                $temp = $logs->where('activity_date', $day)->where('person_id', $personId)->first();
                if ($temp) {
                    $tempVal = $temp->toArray();
                    $data[$i][$personId] = $tempVal[$selectedReviewCategory];
                } else {
                    $data[$i][$personId] = 'no data';
                }
            }
        }

        return view('review.group.list')->with(['selectedGroup' => $selectedGroup, 'selectedReviewCategory' => $selectedReviewCategory, 'selectedDays' => $selectedDays, 'personsInGroup' => $persons, 'groups' => $groups, 'data' => $data]);
    }
}
