<?php

use Illuminate\Database\Seeder;
use App\Person;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $people = [
            ['p1', 'alpha1', 35, 'Male', 70, 168],
            ['p2', 'alpha2', 30, 'Male', 65, 158],
            ['p3', 'alpha3', 25, 'Female', 62, 136],
            ['p1', 'beta1', 55, 'Male', 73, 178],
            ['p2', 'beta2', 42, 'Male', 75, 180],
            ['p3', 'beta3', 20, 'Female', 66, 120],
            ['p4', 'beta4', 23, 'Female', 70, 130],
        ];
        $count = count($people);

        foreach ($people as $peopleData) {
            $person = new Person();

            $person->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $person->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $person->first_name = $peopleData[0];
            $person->last_name = $peopleData[1];
            $person->age = $peopleData[2];
            $person->gender = $peopleData[3];
            $person->height = $peopleData[4];
            $person->weight = $peopleData[5];

            $person->save();
            $count--;
        }
    }
}
