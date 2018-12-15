<?php

use Illuminate\Database\Seeder;
use App\person;
use App\Log;

class LogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $logs = [
            ['p1 alpha1', 168, '2018-12-01', 'low', 1705, 2046],
            ['p1 alpha1', 167.9, '2018-12-02', 'light', 1705, 2344],
            ['p1 alpha1', 167.8, '2018-12-03', 'low', 1704, 2045],
            ['p1 alpha1', 167.8, '2018-12-04', 'moderate', 1704, 2641],
            ['p1 alpha1', 167.8, '2018-12-05', 'moderate', 1704, 2641],
            ['p1 alpha1', 167.7, '2018-12-06', 'low', 1704, 2343],
            ['p1 alpha1', 167.7, '2018-12-07', 'low', 1704, 2343],
            ['p1 alpha1', 167.7, '2018-12-08', 'high', 1704, 2939],
            ['p1 alpha1', 167.0, '2018-12-09', 'low', 1701, 2041],
            ['p1 alpha1', 167.0, '2018-12-10', 'low', 1701, 2041],
            ['p1 alpha1', 167.0, '2018-12-11', 'light', 1701, 2339],
            ['p1 alpha1', 167.4, '2018-12-12', 'light', 1703, 2342],
            ['p1 alpha1', 167.4, '2018-12-13', 'low', 1703, 2044],
            ['p1 alpha1', 167.4, '2018-12-14', 'low', 1703, 2044],
            ['p1 alpha1', 167.5, '2018-12-15', 'low', 1703, 2044],


            ['p2 alpha2', 158, '2018-12-01', 'low', 1605, 1926],
            ['p2 alpha2', 157.9, '2018-12-02', 'light', 1605, 2207],
            ['p2 alpha2', 157.8, '2018-12-03', 'low', 1604, 1926],
            ['p2 alpha2', 157.8, '2018-12-04', 'moderate', 1605, 2488],
            ['p2 alpha2', 157.7, '2018-12-06', 'low', 1604, 1925],
            ['p2 alpha2', 157.7, '2018-12-07', 'low', 1604, 1925],
            ['p2 alpha2', 157.7, '2018-12-08', 'low', 1604, 1925],
            ['p2 alpha2', 157.0, '2018-12-09', 'high', 1601, 2762],
            ['p2 alpha2', 157.0, '2018-12-10', 'low', 1601, 1921],
            ['p2 alpha2', 157.0, '2018-12-11', 'light', 1601, 2201],
            ['p2 alpha2', 156.9, '2018-12-12', 'light', 1600, 2200],
            ['p2 alpha2', 157.1, '2018-12-13', 'low', 1601, 1921],
            ['p2 alpha2', 157.4, '2018-12-14', 'low', 1601, 2201],
            ['p2 alpha2', 157.0, '2018-12-15', 'light', 1601, 2201]
        ];

        $count = count($logs);

        foreach ($logs as $logData) {
            $personName = explode(' ', $logData[0]);

            $person_id = Person::where('last_name', '=', $personName[1])->where('first_name', '=', $personName[0])->pluck('id')->first();

            $log = new Log();

            $log->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $log->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $log->weight = $logData[1];
            $log->activity_date = $logData[2];
            $log->activity = $logData[3];
            $log->bmr = $logData[4];
            $log->calories_burned = $logData[5];
            $log->person_id = $person_id;

            $log->save();
            $count--;
        }
    }
}
