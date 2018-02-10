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

Route::get('/', 'IndexController@index');

Route::get('/test', 'IndexController@index')->middleware('auth');

Auth::routes();


//user
Route::get('/desktop', 'User\DesktopController@index');

Route::get('/statistics', 'User\StatisticsController@index');


//teacher
Route::get('/teacher/worktop', 'Teacher\WorktopController@index');

Route::get('/teacher/homeworks', 'Teacher\HomeworksController@index');

Route::get('/teacher/homeworks/view', 'Teacher\SetHomeworksController@index');

Route::get('/teacher/homeworks/view/set', 'Teacher\SetHomeworksController@index');

Route::get('/teacher/homeworks/add', 'Teacher\SetHomeworksController@index');

Route::get('/teacher/classrooms', 'Teacher\ClassroomsController@index');

Route::get('/teacher/classrooms/teachereg', 'Teacher\TeacheregController@index');

Route::get('/teacher/classrooms/usereg', 'Teacher\UseregController@index');


