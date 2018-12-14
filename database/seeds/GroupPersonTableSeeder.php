<?php

use Illuminate\Database\Seeder;
use App\Group;
use App\Person;

class GroupPersonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # First, create an array of all the books we want to associate tags with
        # The *key* will be the book title, and the *value* will be an array of tags.
        # Note: purposefully omitting the Harry Potter books to demonstrate untagged books
        $groups = [
            'alpha_group' => ['p1 alpha1', 'p2 alpha2', 'p3 alpha3', 'p3 beta3', 'p4 beta4'],
            'beta_group' => ['p1 beta1', 'p2 beta2', 'p3 beta3', 'p4 beta4', 'p1 alpha1', 'p2 alpha2']
        ];

        # Now loop through the above array, creating a new pivot for each book to tag
        foreach ($groups as $name => $people) {
            # First get the book
            $group = Group::where('name', 'like', $name)->first();

            # Now loop through each tag for this book, adding the pivot
            foreach ($people as $personName) {
                $name = explode(' ', $personName);
                $firstName = $name[0];
                $lastName = $name[1];
                $person = Person::where('first_name', 'LIKE', $firstName)->where('last_name', 'LIKE', $lastName)->first();

                # Connect this tag to this book
                $group->people()->save($person);
            }
        }
    }
}
