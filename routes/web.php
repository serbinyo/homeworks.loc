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


//USER

Route::get('/desktop', 'User\DesktopController@index');


//Route::get('/homeworks', 'User\UserHomeworksController@index');

//Route::get('/homeworks/view', 'User\UserViewHomeworkController@index');

//Route::get('/homeworks/view/solve', 'User\UserSolveHomeworkController@index');


Route::get('/statistics', 'User\StatisticsController@index');


//TEACHER

Route::get('/teacher', 'Teacher\DesktopController@index');

//Set-Unset

Route::get('/teacher/set/work/{id}', 'Teacher\Set\SetWorkController@index')->name('indexSet');

Route::post('/teacher/set/work', 'Teacher\Set\SetWorkController@set')->name('setWork');

Route::get('/teacher/set/individually/{id}', 'Teacher\Set\SetIndividuallyController@index')->name('indexIndividually');

Route::post('/teacher/set/individually', 'Teacher\Set\SetIndividuallyController@set')->name('setIndividually');

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
