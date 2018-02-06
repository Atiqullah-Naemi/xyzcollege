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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/student/{name}', function() {
	return redirect('/');
})->where('name', '[A-Za-z]+');

Route::resource('student', 'studentController');

Route::post('getData', 'studentController@getData');

Route::post('listCourse', 'studentController@listCourse');

Route::resource('course', 'courseController');

Route::get('/course/{name}', function() {
	return redirect('/');
})->where('name', '[A-Za-z]+');

Route::post('getCourse', 'courseController@getCourse');
