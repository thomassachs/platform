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

Route::get('/instructor/edit/{id}/general' , 'InstructorController@editGeneral')->middleware('isPending');

Route::get('/instructor/edit/{id}/description' , 'InstructorController@editDescription')->middleware('isPending');

Route::get('/instructor/edit/{id}/lectures', 'InstructorController@editLectures')->middleware('isPending');

Route::get('/instructor/edit/{id}/pricing', 'InstructorController@editPrice')->middleware('isPending');

Route::get('/instructor/edit/{id}/submit', 'InstructorController@submitCourse')->middleware('isPending');


// courses routes
Route::get('/course/{courseName}', 'PagesController@coursePage');

Route::get('/course/{courseName}', 'PagesController@coursePage');

Route::resource('courses', 'CoursesController');

Route::post('/course/{id}/changeimage', 'CoursesController@changeImage');

Route::post('/course/{id}/editPrice', 'CoursesController@editPrice');

Route::post('/course/{id}/submitCourse', 'CoursesController@submitCourse');


// descriptionItem Route
Route::post('/instructor/{id}/addRequirement', 'DescriptionItemsController@addRequirement');

Route::post('/instructor/{id}/addLearnGoal', 'DescriptionItemsController@addLearnGoal');


// section routes
Route::post('section/{course_id}', 'SectionsController@create')->name('createSection');

Route::post('section/{section_id}/{course_id}', 'SectionsController@rename')->name('renameSection');

Route::post('moveSectionUp/{section_id}', 'SectionsController@moveUp')->name('moveUpSection');

Route::post('moveSectionDown/{section_id}', 'SectionsController@moveDown')->name('moveDownSection');

Route::post('sectionDestroy/{section_id}', 'SectionsController@destroy')->name('destroySection');


// lecture routes
Route::post('lecture/{section_id}/{course_id}', 'LecturesController@store')->name('storeLecture');

Route::post('moveLectureUp/{lecture_id}', 'LecturesController@moveUp')->name('moveUpLecture');

Route::post('moveLectureDown/{lecture_id}', 'LecturesController@moveDown')->name('moveDownLecture');

Route::post('renamelecture/{lecture_id}/{course_id}', 'LecturesController@rename')->name('renameLecture');

Route::post('lectureDestroy/{lecture_id}', 'LecturesController@destroy')->name('destroyLecture');
