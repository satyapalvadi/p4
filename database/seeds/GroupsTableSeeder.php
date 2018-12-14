<?php

use Illuminate\Database\Seeder;
use App\Group;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = [
            ['alpha_group', 5],
            ['beta_group', 8],
            ['gamma_group', 10]
        ];
        $count = count($groups);

        foreach ($groups as $groupData) {
            $group= new Group();

            $group->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $group->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $group->name = $groupData[0];
            $group->max_size = $groupData[1];

            $group->save();
            $count--;
        }
    }
}
