<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth(); 

Route::get('/home', 'HomeController@index');
//Route::get('/meal', 'MealController@index');



Route::get('meal1', function(){
//	return App\User::find(1);  // returns selected item in db table

	return App\Meals::where('user_id', '=', '1')->first();
});


Route::resource('meal','MealController');
Route::resource('food','FoodController');
