<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;

class GroupController extends Controller
{
    //GET a list of all groups
    //GET /group/view
    public function view(){
        $groups = Group::orderBy('name')->get();
        return view('group.view')->with(['groups' => $groups]);
    }


    //GET the empty form to create group.
    //GET /group/create/display
    public function displayCreateGroupForm(){
        return view('group.create');
    }

    //POST to create a group
    //POST /group/create
    public function create(Request $request){
        $request->validate([
            'name' => 'required',
            'size' => 'required',
        ]);

        $group = new Group();

        $group->name = $request->name;
        $group->max_size = $request->size;

        $group->save();

        return redirect('group/view')->with([
            'alert' => 'Your group was created.'
        ]);
    }

    //GET to display edit from
    //GET /group/{id}/edit/display
    public function displayEditGroupForm($id){
        $group = Group::find($id);
        return view('group.edit')->with(['group' => $group]);
    }

    //PUT to edit a group
    //PUT /group/{id}/edit
    public function edit(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'size' => 'required',
        ]);

        $group = Group::find($id);

        $group->name = $request->name;
        $group->max_size = $request->size;

        $group->save();

        return redirect('/group/view')->with(["alert" => "Group is updated"]);
    }
}
