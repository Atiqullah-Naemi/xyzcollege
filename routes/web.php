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
    return view('layouts/app');
});

Route::resource('students', 'StudentController');
Route::resource('courses', 'CourseController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
