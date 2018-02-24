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


//Route::get('/homeworks', 'User\UserHomeworksController@index');

//Route::get('/homeworks/view', 'User\UserViewHomeworkController@index');

//Route::get('/homeworks/view/solve', 'User\UserSolveHomeworkController@index');


Route::get('/statistics', 'User\StatisticsController@index');


//teacher

/*
Route::get('/teacher', 'Teacher\DesktopController@index');


Route::get('/teacher/works', 'Teacher\WorksController@index');

Route::get('/teacher/works/view', 'Teacher\ViewWorkController@index');

Route::get('/teacher/works/view/set', 'Teacher\SetWorkController@index');

Route::get('/teacher/works/add', 'Teacher\AddWorkController@index');

Route::get('/teacher/works/add/tasks', 'Teacher\AddTaskController@index');

Route::get('/teacher/works/add/tasks/new', 'Teacher\NewTaskController@index');

Route::get('/teacher/works/add/tests', 'Teacher\AddTestController@index');

Route::get('/teacher/works/add/tests/new', 'Teacher\NewTestController@index');

Route::get('/teacher/works/add/materials', 'Teacher\AddMaterialController@index');

Route::get('/teacher/works/add/materials/new', 'Teacher\NewMaterialController@index');


Route::get('/teacher/doneworks', 'Teacher\DoneWorksController@index');

Route::get('/teacher/doneworks/check', 'Teacher\CheckDoneWorksController@index');

Route::get('/teacher/doneworks/check/edit', 'Teacher\EditDoneWorksController@index');


Route::get('/teacher/classrooms', 'Teacher\ClassroomsController@index');

Route::get('/teacher/classrooms/teachereg', 'Teacher\TeacheRegController@index');

Route::get('/teacher/classrooms/usereg', 'Teacher\UseRegController@index');
 */


Route::get('/teacher', 'Teacher\DesktopController@index');

//Set-Unset

Route::post('/teacher/set/homework', 'Teacher\Set\SetHomeworkController')->name('setHomework');

Route::post('/teacher/set/task', 'Teacher\Set\SetTaskController')->name('setTask');

Route::post('/teacher/unset/task/', 'Teacher\Set\UnsetTaskController')->name('unsetTask');

Route::post('/teacher/set/test', 'Teacher\Set\SetTestController')->name('setTest');

Route::post('/teacher/unset/test/', 'Teacher\Set\UnsetTestController')->name('unsetTest');

Route::post('/teacher/set/material', 'Teacher\Set\SetMaterialController')->name('setMaterial');

Route::post('/teacher/unset/material/', 'Teacher\Set\UnsetMaterialController')->name('unsetMaterial');



Route::resource('/teacher/tasks', 'Teacher\TaskController');

Route::resource('/teacher/tests', 'Teacher\TestController');

Route::resource('/teacher/materials', 'Teacher\MaterialController');

Route::resource('/teacher/works', 'Teacher\WorksController');



Route::resource('/teacher/homeworks', 'Teacher\HomeworksController');



Route::get('/teacher/classrooms', 'Teacher\ClassroomsController@index');

Route::get('/teacher/classrooms/teachereg', 'Teacher\TeacheRegController@index');

Route::get('/teacher/classrooms/usereg', 'Teacher\UseRegController@index');

Event::listen('illuminate.query', function($sql)
{
    dd($sql);
});


