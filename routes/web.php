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

Route::get('/homeworks', 'User\Homework\UsrChoiceController@index');

Route::get('/homeworks/{discipline_id}', 'User\Homework\UsrChoiceController@show_dates')->name('showUsrDates');

Route::get('/homeworks/{discipline_id}/{date}', 'User\Homework\UsrChoiceController@show_homeworks')->name('showHomeworks');

Route::resource('/homeworks/{discipline_id}/{date}/hometask', 'User\HometaskController');

Route::resource('/homeworks/{discipline_id}/{date}/hometask/{hwrk_id}/given_task', 'User\GivenTaskController');

Route::resource('/homeworks/{discipline_id}/{date}/hometask/{hwrk_id}/given_test', 'User\GivenTestController');

Route::post('/homeworks/pass_homework', 'User\Homework\PassController@pass')->name('passHomework');


Route::get('/statistics', 'User\StatisticsController@index');


//TEACHER

Route::get('/teacher', 'Teacher\DesktopController@index');

//Set-Unset

Route::get('/teacher/works/{id}/set', 'Teacher\Set\SetWorkController@index')->name('indexSet');

Route::post('/teacher/works/set', 'Teacher\Set\SetWorkController@set')->name('setWork');

Route::get('/teacher/works/{id}/individually', 'Teacher\Set\SetIndividuallyController@index')->name('indexIndividually');

Route::post('/teacher/works/individually', 'Teacher\Set\SetIndividuallyController@set')->name('setIndividually');

Route::post('/teacher/set/task', 'Teacher\Set\SetTaskController')->name('setTask');

Route::post('/teacher/unset/task', 'Teacher\Set\UnsetTaskController')->name('unsetTask');

Route::post('/teacher/set/test', 'Teacher\Set\SetTestController')->name('setTest');

Route::post('/teacher/unset/test', 'Teacher\Set\UnsetTestController')->name('unsetTest');

Route::post('/teacher/set/material', 'Teacher\Set\SetMaterialController')->name('setMaterial');

Route::post('/teacher/unset/material/', 'Teacher\Set\UnsetMaterialController')->name('unsetMaterial');

// For works

Route::resource('/teacher/tasks', 'Teacher\TaskController');

Route::resource('/teacher/tests', 'Teacher\TestController');

Route::resource('/teacher/materials', 'Teacher\MaterialController');

Route::resource('/teacher/works', 'Teacher\WorksController');


// Teachers Homework

Route::get('/teacher/homeworks', 'Teacher\Homework\TchrChoiceController@index');

Route::post('/teacher/repass', 'Teacher\Homework\RePassController@repass')->name('toRePass');

Route::get('/teacher/homeworks/{grade_id}', 'Teacher\Homework\TchrChoiceController@show_dates')->name('showTcrDates');

Route::get('/teacher/homeworks/{grade_id}/{date}', 'Teacher\Homework\TchrChoiceController@show_homeworks')->name('showHwKids');

Route::resource('/teacher/homeworks/{grade_id}/{date}/homework', 'Teacher\HomeworkController');

// Teachers Lists

Route::get('/teacher/lists', 'Teacher\ListsController@index');

Route::get('/teacher/lists/grades', 'Teacher\ListsController@grade_list');

Route::get('/teacher/lists/grades/view', 'Teacher\ListsController@grade_show_by_get')->name('gradeShowGet');

Route::get('/teacher/lists/grades/{id}', 'Teacher\ListsController@grade_show')->name('gradeShow');

Route::get('/teacher/lists/disciplines', 'Teacher\ListsController@discipline_list');

Route::get('/teacher/lists/disciplines/view', 'Teacher\ListsController@discipline_show_by_get')->name('disciplineShowGet');

Route::get('/teacher/lists/disciplines/{id}', 'Teacher\ListsController@discipline_show')->name('disciplineShow');

Route::get('/teacher/lists/schoolkids', 'Teacher\ListsController@schoolkid_list');

Route::get('/teacher/lists/teachers', 'Teacher\ListsController@teacher_list');


//Teacher Account

Route::get('/teacher/account/change_password', 'Teacher\ChangePasswordController@index');

Route::post('/teacher/account/change_password', 'Teacher\ChangePasswordController@change')->name('teacherPasswordChange');

Route::resource('/teacher/account', 'Teacher\AccountController');


//ADMIN

Route::get('/admin', 'Admin\DesktopController@index');

// Register

Route::resource('/admin/teach', 'Admin\PedagogueController');

Route::resource('/admin/kid', 'Admin\SchoolkidController');

Route::get('/admin/register/redirect-to-main-page-after-registration', 'Admin\InfoPagesController@afterReg');

// Create

Route::resource('/admin/grade', 'Admin\GradeController');

Route::resource('/admin/discipline', 'Admin\DisciplineController');

// Admin Lists

Route::get('/admin/lists', 'Admin\ListsController@index');

Route::get('/admin/lists/grades', 'Admin\ListsController@grade_list');

Route::get('/admin/lists/disciplines', 'Admin\ListsController@discipline_list');

Route::get('/admin/lists/schoolkids', 'Admin\ListsController@schoolkid_list');

Route::get('/admin/lists/teachers', 'Admin\ListsController@teacher_list');


//Route::get('/admin/admin_lists', 'Teacher\AdminListsController@index');
//
//Route::get('/admin/lists/admin_grades/view', 'Teacher\AdminGradeController@view_by_get')->name('AdminGradeView');
//
//Route::resource('/admin/lists/admin_grades', 'Teacher\AdminGradeController');
//
//Route::get('/admin/lists/admin_disciplines/view', 'Teacher\AdminDisciplineController@view_by_get')->name('AdminDisciplineView');
//
//Route::resource('/admin/lists/admin_disciplines', 'Teacher\AdminDisciplineController');
//
//Route::resource('/admin/lists/admin_schoolkids', 'Teacher\AdminSchoolkidController');
//
//Route::resource('/admin/lists/admin_teachers', 'Teacher\AdminAccountController');
//
//Route::resource('/admin/admin_account', 'Teacher\AdminAccountController');
