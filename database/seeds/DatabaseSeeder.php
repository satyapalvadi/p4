<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GroupsTableSeeder::class);
        $this->call(PeopleTableSeeder::class);
        $this->call(GroupPersonTableSeeder::class);
        $this->call(LogsTableSeeder::class);
    }
}
