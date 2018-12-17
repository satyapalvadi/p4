<?php

use Illuminate\Database\Seeder;
use App\Group;
use App\Person;

class GroupPersonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $groups = [
            'alpha_group' => ['p1 alpha1', 'p2 alpha2', 'p3 alpha3', 'p3 beta3', 'p4 beta4'],
            'beta_group' => ['p1 beta1', 'p2 beta2', 'p3 beta3', 'p4 beta4', 'p1 alpha1', 'p2 alpha2']
        ];

        foreach ($groups as $name => $people) {
            $group = Group::where('name', 'like', $name)->first();

            foreach ($people as $personName) {
                $name = explode(' ', $personName);
                $firstName = $name[0];
                $lastName = $name[1];
                $person = Person::where('first_name', 'LIKE', $firstName)->where('last_name', 'LIKE', $lastName)->first();

                $group->people()->save($person);
            }
        }
    }
}
