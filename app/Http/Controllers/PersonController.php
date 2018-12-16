<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Person;
use App\Log;

class PersonController extends Controller
{
    public function view()
    {
        $people = Person::orderBy('last_name')->get();
        $data = [];

        foreach ($people as $person) {
            $selectedGroups = $person->groups()->pluck('groups.name')->toArray();
            $person["selectedGroups"] = $selectedGroups;
            array_push($data, $person);
        }

        return view('person.view')->with(['people' => $data]);
    }

    //GET the empty form to create group.
    //GET /group/create/display
    public function displayCreatePersonForm()
    {
        $groups = Group::getForDropdown();

        return view('person.create')->with(['groups' => $groups]);
    }

    //POST to create a person
    //POST /person/create
    public function create(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'height' => 'required',
            'weight' => 'required'
        ]);

        $selectedGroupsArray = Group::whereIn('id', $request->grps)->get();
        $capacityFullGroups = [];

        foreach ($selectedGroupsArray as $grp) {
            $currentCapacity = Group::find($grp->id)->people()->count();
            if ($currentCapacity >= $grp->max_size) {
                array_push($capacityFullGroups, $grp->name);
            }
        }
        if (count($capacityFullGroups) > 0) {
            $fullGroupString = '';
            foreach ($capacityFullGroups as $fullGroup) {
                $fullGroupString = $fullGroupString . " " . $fullGroup;
            }

            return redirect('person/create/display')->with(['alert' => 'These selected groups are full: ' . $fullGroupString . ' Please select other groups and try again.', 'first_name' => 'satya']);
        }

        $person = new Person();

        $person->first_name = $request->first_name;
        $person->last_name = $request->last_name;
        $person->gender = $request->gender;
        $person->age = $request->age;
        $person->height = $request->height;
        $person->weight = $request->weight;
        $person->save();

        $person->groups()->sync($request->grps);

        return redirect('person/view')->with([
            'alert' => 'A new person was created.'
        ]);
    }




    //GET to display edit from
    //GET /person/{id}/edit/display
    public function displayEditPersonForm($id)
    {
        $person = Person::find($id);
        $groups = Group::getForDropdown();
        $selectedGroups = $person->groups()->pluck('groups.id')->toArray();

        return view('person.edit')->with(['person' => $person, 'groups' => $groups, 'selectedGroups' => $selectedGroups]);
    }

    //PUT to edit a person
    //PUT /person/{id}/edit
    public function edit(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'height' => 'required',
            'weight' => 'required'
        ]);

        $person = Person::find($id);

        $person->first_name = $request->first_name;
        $person->last_name = $request->last_name;
        $person->gender = $request->gender;
        $person->age = $request->age;
        $person->height = $request->height;
        $person->weight = $request->weight;

        $person->save();

        $person->groups()->sync($request->grps);

        return redirect('/person/view')->with(["alert" => "Person updated"]);
    }

    public function displayDeletePersonForm($id)
    {
        $person = Person::find($id);

        return view('person.delete')->with(['person' => $person]);
    }

    public function delete(Request $request, $id)
    {
        $person = Person::find($id);

        //first delete associated groups from the pivot table
        $person->groups()->detach();

        //delete from person's activity from logs table
        $logs = Log::where('person_id', '=', $id)->delete();

        //then delete from people table
        $person->delete();

        return redirect('/person/view')->with(["alert" => "All info related to the selected person was deleted."]);
    }

}
