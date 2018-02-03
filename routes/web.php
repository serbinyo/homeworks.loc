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

Route::get('test', 'IndexController@index')->middleware('auth');;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//  //user
//Route::get('homeworks', 'User\HomeworksController@userhomeworks');
//
//Route::get('solve/{id}', 'User\HomeworksController@edit')->name('solveHomework');
//
//Route::get('result/{id}', 'User\HomeworksController@show')->name('resultOfHomework');
//
Route::get('statistics', 'User\StatisticsController@index');


//  //teacher
Route::get('teacher/sethometask', 'Teacher\SethometasksController@index');
//
//Route::get('teacher/addhomework', 'Teacher\WorksController@create');
//
//Route::get('teacher/addtask', 'Teacher\TaskController@create');
//
//Route::get('teacher/addtest', 'Teacher\TestController@create');
//
//Route::get('teacher/addmaterial', 'Teacher\MaterialController@create');
//
//Route::get('teacher/hometasks', 'Teacher\HomeworksController@index');
//
//Route::get('teacher/solved', 'Teacher\HomeworksController@solved');
//
//Route::get('teacher/taskcheck/{id}', 'Teacher\HomeworksController@show')->name('taskCheck');
//
//Route::get('teacher/taskcontrol/{id}', 'Teacher\HomeworksController@edit')->name('taskControl');

