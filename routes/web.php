<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'LogController@displayLogForm');
Route::get('/log', 'LogController@displayLogForm');

Route::post('/log/create', 'LogController@create');

//Create a new group
Route::get('group/create/display','GroupController@displayCreateGroupForm');
Route::post('group/create','GroupController@create');

//Edit a group
Route::get('group/{id}/edit/display','GroupController@displayEditGroupForm');
Route::put('group/{id}/edit','GroupController@edit');

//Display all groups
Route::get('group/view','GroupController@view');

//Create a new person
Route::get('person/create/display','PersonController@displayCreatePersonForm');
Route::post('person/create','PersonController@create');

//Edit a person
Route::get('person/{id}/edit/display','PersonController@displayEditPersonForm');
Route::put('person/{id}/edit','PersonController@edit');

//Display all persons
Route::get('person/view','PersonController@view');


Route::get('review/person/display','ReviewController@displayReviewPerson');
Route::get('review/person/list','ReviewController@listReviewPerson');

Route::get('review/group','ReviewController@group');

/*
 * Pages
 * Simple, static pages without a lot of logic
 */
Route::view('/about', 'about');
Route::view('/contact', 'contact');


Route::get('/debug', function () {

    $debug = [
        'Environment' => App::environment(),
    ];

    /*
    The following commented out line will print your MySQL credentials.
    Uncomment this line only if you're facing difficulties connecting to the
    database and you need to confirm your credentials. When you're done
    debugging, comment it back out so you don't accidentally leave it
    running on your production server, making your credentials public.
    */
    #$debug['MySQL connection config'] = config('database.connections.mysql');

    try {
        $databases = DB::select('SHOW DATABASES;');
        $debug['Database connection test'] = 'PASSED';
        $debug['Databases'] = array_column($databases, 'Database');
    } catch (Exception $e) {
        $debug['Database connection test'] = 'FAILED: '.$e->getMessage();
    }

    dump($debug);
});


