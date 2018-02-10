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


Route::get('/homeworks', 'User\UserHomeworksController@index');

Route::get('/homeworks/view', 'User\UserViewHomeworkController@index');

Route::get('/homeworks/view/solve', 'User\UserSolveHomeworkController@index');


Route::get('/statistics', 'User\StatisticsController@index');


//teacher
Route::get('/teacher', 'Teacher\DesktopController@index');


Route::get('/teacher/homeworks', 'Teacher\HomeworksController@index');

Route::get('/teacher/homeworks/view', 'Teacher\ViewHomeworkController@index');

Route::get('/teacher/homeworks/view/set', 'Teacher\SetHomeworkController@index');

Route::get('/teacher/homeworks/add', 'Teacher\AddHomeworkController@index');

Route::get('/teacher/homeworks/add/tasks', 'Teacher\AddTaskController@index');

Route::get('/teacher/homeworks/add/tasks/new', 'Teacher\NewTaskController@index');

Route::get('/teacher/homeworks/add/tests', 'Teacher\AddTestController@index');

Route::get('/teacher/homeworks/add/tests/new', 'Teacher\NewTestController@index');

Route::get('/teacher/homeworks/add/materials', 'Teacher\AddMaterialController@index');

Route::get('/teacher/homeworks/add/materials/new', 'Teacher\NewMaterialController@index');


Route::get('/teacher/doneworks', 'Teacher\DoneWorksController@index');

Route::get('/teacher/doneworks/check', 'Teacher\CheckDoneWorksController@index');

Route::get('/teacher/doneworks/check/edit', 'Teacher\EditDoneWorksController@index');


Route::get('/teacher/classrooms', 'Teacher\ClassroomsController@index');

Route::get('/teacher/classrooms/teachereg', 'Teacher\TeacheRegController@index');

Route::get('/teacher/classrooms/usereg', 'Teacher\UseRegController@index');


