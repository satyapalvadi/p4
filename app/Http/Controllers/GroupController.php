<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;

class GroupController extends Controller
{
    //GET a list of all groups
    //GET /group/view
    public function view()
    {
        $groups = Group::orderBy('name')->get();
        $data = [];

        foreach ($groups as $group) {
            //retrieve the count of people that are already present in each group.
            $personCount = $group->people()->count();
            $temp = ['id' => $group->id, 'name' => $group->name, 'max_size' => $group->max_size, 'current_count' => $personCount];
            array_push($data, $temp);
        }

        return view('group.view')->with(['groups' => $data]);
    }


    //GET the empty form to create group.
    //GET /group/create/display
    public function displayCreateGroupForm()
    {
        return view('group.create');
    }

    //POST to create a group
    //POST /group/create
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'size' => 'required|numeric|min:0',
        ]);

        $group = new Group();

        $group->name = $request->name;
        $group->max_size = $request->size;

        $group->save();

        return redirect('group/view')->with([
            'success-alert' => 'Group was created successfully.'
        ]);
    }

    //GET to display edit from
    //GET /group/{id}/edit/display
    public function displayEditGroupForm($id)
    {
        $group = Group::find($id);

        return view('group.edit')->with(['group' => $group]);
    }

    //PUT to edit a group
    //PUT /group/{id}/edit
    public function edit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'size' => 'required|numeric|min:0',
        ]);

        $group = Group::find($id);

        $group->name = $request->name;
        $group->max_size = $request->size;

        $group->save();

        return redirect('/group/view')->with(["success-alert" => "Group was updated successfully."]);
    }
}
