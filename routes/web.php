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
Route::get('login', 	'SessionsController@create')->name('login');
Route::post('login',	'SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');

Route::get('signup', 'UsersController@create')->name('signup');
Route::resource('users', 'UsersController');
Route::resource('institutions','InstitutionsController');
Route::resource('classrooms', 'ClassroomsController');
Route::resource('schoolclasses','SchoolClassesController');
Route::resource('courses','CoursesController');
Route::get('courses/lessons', 'CoursesController@needLessons')->name('needLessons');
Route::resource('teachers', 'TeachersController');
Route::resource('students', 'StudentsController');
//Route::resource('schedules', 'SchedulesController');
//Route::resource('lessons', 'LessonsController');
//Route::get('schoolclasses/{schoolclasses}', 'SchoolClassesController@show');
Route::get('schedules/create', 'SchedulesController@create')->name('schedules.create');
Route::post('schedules', 'SchedulesController@store')->name('schedules.store');
Route::get('schedules/{class_id}/{course_id}/{teacher_id}', 'SchedulesController@show')
    ->name('schedules.show');
Route::get('schedules', 'SchedulesController@index')->name('schedules.index');
Route::any('schedules/schedule/{institution}', 'SchedulesController@setSchedule')->name('schedules.setSchedule');

Route::get('/lessons/{course}/create', 'LessonsController@create')->name('lessons.create');
Route::get('lessons/{course}','LessonsController@show')->name('lessons.show');
Route::patch('lessons/{course}','LessonsController@update')->name('lessons.update');
Route::post('lessons/lessons','LessonsController@store')->name('lessons.store');
Route::get('lessons/{course}/edit','LessonsController@edit')->name('lessons.edit');

Route::get('students_info_maintain', 'StudentsController@create')->name('students_info_maintain');
Route::get('students_courses_maintain', 'StudentsController@courses_maintain')->name('students_courses_maintain');

Route::get('classes_info_maintain', 'SchoolClassesController@info_maintain')->name('classes_info_maintain');
Route::get('class_course_setting', 'SchoolClassesController@class_course_setting')->name('class_course_setting');
Route::get('classrooms_setting', 'SchoolClassesController@classrooms_setting')->name('classrooms_setting');
Route::get('class_students_setting', 'SchoolClassesController@class_students_setting')->name('class_students_setting');
Route::get('/', function () {
    return view('home');
})->name('home');

