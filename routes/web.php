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


//user

Route::get('desktop', 'User\DesktopController@index');

Route::get('statistics', 'User\StatisticsController@index');



//teacher
Route::get('teacher/worktop', 'Teacher\WorktopController@index');

Route::get('teacher/sethometask', 'Teacher\SethometasksController@index');


