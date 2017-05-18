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
Route::get('/course/edit/{entityId}', 'CourseController@edit')->middleware('auth')->name('course_edit');
Route::get('/course/view/{entityId}', 'CourseController@view')->middleware('auth')->name('course_view');
Route::get('/course/schedule/{entityId}', 'CourseController@edit')->middleware('auth')->name('course_schedule');
Route::post('/course/add', 'CourseController@create')->middleware('auth')->name('course_create');
Route::post('/course/edit', 'CourseController@update')->middleware('auth')->name('course_update');
Route::post('/course/delete', 'CourseController@delete')->middleware('auth')->name('course_delete');
Route::get('/course/preq/form/{type}/{index?}/{id?}', 'CourseController@getPreqForm')->middleware('auth')->name('course_get_req');
Route::post('/course/requisites/add', 'Course\RequisitesController@create')->middleware('auth')->name('course_requisite_create');
Auth::routes();

Route::get('/home', 'HomeController@index');
