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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/courses/{criteria?}/{order?}', 'CourseController@index')->middleware('auth')->name('course_list');
Route::get('/course/add', 'CourseController@add')->middleware('auth')->name('course_add');
Route::get('/course/edit', 'CourseController@edit')->middleware('auth')->name('course_edit');