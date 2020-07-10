<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
use App\Lecture;
use App\Course;
use Carbon\Carbon;

class SectionsController extends Controller
{
    public function create(Request $request, $id)
    {
        // validate the input of the instructor
        $this->validate($request, [
            'sectionName' => ['required', 'max:255'],
        ]);

        // Create Section
        $section = new Section;
        $section->name = $request->input('sectionName');

        // find sections of the course and give the newly created section the position
        $course = Course::find($id);
        $section->position = 1 + count($course->sections);
        $section->course_id = $id;

        $section->save();

        return redirect('/instructor/edit/' . $id . '/lectures');
    }

    public function rename(Request $request, $sectionId, $courseId)
    {
        // validate the input of the instructor
        $this->validate($request, [
            'sectionName' => ['required', 'max:255'],
        ]);

        $section = Section::find($sectionId);
        $section->name = $request->input('sectionName');
        $section->save();

        return redirect('/instructor/edit/' . $courseId . '/lectures');
    }

    public function destroy($id)
    {
        $section = Section::find($id);
        $course = Course::find($section->course_id);

        $subTimeFromCourse = 0;
        // delete all lectures of the section
        foreach ($section->lectures as $lecture) {

            // substract the lecture video duration from course duration
            if($lecture->video_duration != NULL){
                $lduration = Carbon::createFromFormat('H:i:s', $lecture->video_duration);
                $subTimeFromCourse += $lduration->secondsSinceMidnight();

            }

            $lecture->delete();
        }

        $currentCourseDuration = Carbon::createFromFormat('H:i:s', $course->course_duration);
        $course->course_duration = $currentCourseDuration->subSeconds($subTimeFromCourse);
        $course->save();

        // set sections with higher position one position down
        foreach ($course->sections as $otherSection) {
            if($otherSection->position > $section->position){
                $otherSection->position = $otherSection->position -1;
                $otherSection->save();
            }
        }


        $section->delete();

        return redirect('/instructor/edit/' . $section->course_id . '/lectures')->with('success', 'Section Removed');
    }

    public function moveUp($sectionId)
    {

        $currentSection = Section::find($sectionId);

        $course = Course::find($currentSection->course_id);

        // set the section with higher position one position down
        foreach ($course->sections as $otherSection) {
            if($otherSection->position == $currentSection->position -1){
                $otherSection->position = $otherSection->position + 1;
                $otherSection->save();
            }
        }


        $currentSection->position = $currentSection->position - 1;

        $currentSection->save();

        return redirect('/instructor/edit/' . $currentSection->course_id . '/lectures')->with('success', 'Section moved upwards' );
    }

    public function moveDown($sectionId)
    {

        $currentSection = Section::find($sectionId);

        $course = Course::find($currentSection->course_id);

        // set the section with higher position one position down
        foreach ($course->sections as $otherSection) {
            if($otherSection->position == $currentSection->position +1){
                $otherSection->position = $otherSection->position - 1;
                $otherSection->save();
            }
        }


        $currentSection->position = $currentSection->position + 1;

        $currentSection->save();

        return redirect('/instructor/edit/' . $currentSection->course_id . '/lectures')->with('success', 'Section moved upwards' );
    }



}
