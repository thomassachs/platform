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

Route::get('/instructor/preview/{id}/salespage', 'InstructorController@previewCourseSale');

Route::get('/instructor/preview/{id}/coursepage', 'InstructorController@previewCourseLearn');

Route::get('/instructor/edit/{id}/general' , 'InstructorController@editGeneral');

Route::get('/instructor/edit/{id}/description' , 'InstructorController@editDescription');

Route::get('/instructor/edit/{id}/lectures', 'InstructorController@editLectures');

Route::get('/instructor/edit/{id}/pricing', 'InstructorController@editPrice');

Route::get('/instructor/edit/{id}/submit', 'InstructorController@submitCourse');


// courses routes
Route::get('/course/{courseName}', 'PagesController@coursePage');

Route::get('/course/{courseName}', 'PagesController@coursePage');

Route::resource('courses', 'CoursesController');

Route::post('/course/{id}/changeimage', 'CoursesController@changeImage');


// descriptionItem Route
Route::post('/instructor/{id}/addRequirement', 'DescriptionItemsController@addRequirement');

Route::post('/instructor/{id}/addLearnGoal', 'DescriptionItemsController@addLearnGoal');


// section routes
Route::get('section/{course_id}', 'SectionsController@create')->name('createSection');

Route::get('section/{section_id}/{course_id}', 'SectionsController@rename')->name('renameSection');

Route::get('moveSectionUp/{section_id}', 'SectionsController@moveUp')->name('moveUpSection');

Route::get('moveSectionDown/{section_id}', 'SectionsController@moveDown')->name('moveDownSection');

Route::get('sectionDestroy/{section_id}', 'SectionsController@destroy')->name('destroySection');


// lecture routes
Route::post('lecture/{section_id}/{course_id}', 'LecturesController@store')->name('storeLecture');

Route::get('moveLectureUp/{lecture_id}', 'LecturesController@moveUp')->name('moveUpLecture');

Route::get('moveLectureDown/{lecture_id}', 'LecturesController@moveDown')->name('moveDownLecture');

Route::get('lectureDestroy/{lecture_id}', 'LecturesController@destroy')->name('destroyLecture');
