<?php

use Illuminate\Support\Facades\Route;

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

Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::get('/', function () {
    return view('index');
});

Auth::routes(['verify' => true]);

Route::get('/account', 'HomeController@index')->name('account');


// instructor routes
Route::get('/instructor', 'InstructorController@instructor');

Route::get('/becomeinstructor', 'InstructorController@becomeInstructor');

Route::get('/instructor/mycourses', 'InstructorController@myCourses');

Route::get('/instructor/createcourse', 'InstructorController@createCourse');

Route::get('/instructor/edit/{id}', 'InstructorController@editCourse');


// courses routes
Route::get('/course/{courseName}', 'PagesController@coursePage');

Route::resource('courses', 'CoursesController');


// section routes
Route::get('section/{course_id}', 'SectionsController@create')->name('createSection');

Route::get('section/{section_id}/{course_id}', 'SectionsController@rename')->name('renameSection');

Route::get('sectionDestroy/{section_id}', 'SectionsController@destroy')->name('destroySection');

Route::get('lecture/{section_id}/{course_id}', 'LecturesController@store')->name('storeLecture');
