<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\Log;

class LogController extends Controller
{
    //GET Log Entry form
    public function displayLogForm()
    {
        $persons = Person::orderBy('first_name')->get();

        return view('log.create')->with(["persons" => $persons]);
    }

    //POST /log/create
    public function create(Request $request)
    {
        $request->validate([
            'activity_date' => 'required',
            'activity' => 'required',
            'weight' => 'required'
        ]);

        # Load activity multipliers from the data file
        $activityMultipliersJson = file_get_contents(database_path('/ActivityMultipliers.json'));
        $activityMultipliers = json_decode($activityMultipliersJson, true);

        $person = Person::find($request->person_id);
        $height = $person->height;
        $gender = $person->gender;
        $age = $person->age;

        //calculate bmr
        $s = $gender == 'male' ? 5 : -161;
        $bmr_temp = ((9.99 * $request->weight) + (6.25 * $height) - (4.92 * $age) + $s);
        $bmr = round($bmr_temp, 0, PHP_ROUND_HALF_UP);

        //calculate calories based on activity level
        $calories_burned = round($bmr * $activityMultipliers[$request->activity], 0, PHP_ROUND_HALF_UP);

         //Only create a new record if no record exists for person/activity_date combination
         Log::updateOrCreate(['person_id' => $request->person_id, 'activity_date' => $request->activity_date],
            ['weight' => $request->weight, 'activity' => $request->activity, 'bmr' => $bmr, 'calories_burned' => $calories_burned]);

        return redirect('/log')->with(["success-alert" => "Activity logged."]);
    }
}
