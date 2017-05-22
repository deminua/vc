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

Route::get('/ws', function () {
    return view('ws.index');
});

Route::get('/', function () {
    return view('vue.v1');
});

Route::get('/users', function () {
	$users = \App\User::paginate(5);
	return $users->toJson();
	#return response()->json($users);
});

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
