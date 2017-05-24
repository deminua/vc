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


use Illuminate\Http\Request;

Route::get('/vue/{name}', function ($name) {
    return view('vue.'.$name);
});

Route::get('/vueclip2', function () {
    return view('vue.vueclip2');
});

Route::get('/vueclip', function () {
    return view('vue.vueclip');
});

Route::post('/post', function (Request $request) {
    return dd($request->all());
});

Route::get('/vue5', function () {
    return view('vue.v5');
});

Route::get('/vue4', function () {
    return view('vue.v4');
});

Route::get('/vue3', function () {
    return view('vue.v3');
});

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
