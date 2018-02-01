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
//
//
//  //teacher
Route::get('sethometask', 'Teacher\WorksController@index');
//
//Route::get('addhomework', 'Teacher\WorksController@create');
//
//Route::get('addtask', 'Teacher\TaskController@create');
//
//Route::get('addtest', 'Teacher\TestController@create');
//
//Route::get('addmaterial', 'Teacher\MaterialController@create');
//
//Route::get('hometasks', 'Teacher\HomeworksController@index');
//
//Route::get('solved', 'Teacher\HomeworksController@solved');
//
//Route::get('taskcheck/{id}', 'Teacher\HomeworksController@show')->name('taskCheck');
//
//Route::get('taskcontrol/{id}', 'Teacher\HomeworksController@edit')->name('taskControl');

