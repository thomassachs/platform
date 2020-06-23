<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
use App\Lecture;
use App\Course;

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

        return redirect('/instructor/edit/' . $id);
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

        return redirect('/instructor/edit/' . $courseId);
    }

    public function destroy($id)
    {
        $section = Section::find($id);
        // delete all lectures of the section
        foreach ($section->lectures as $lecture) {
            $lecture->delete();
        }


        $course = Course::find($section->course_id);

        // set sections with higher position one poisition down
        foreach ($course->sections as $otherSection) {
            if($otherSection->position > $section->position){
                $otherSection->position = $otherSection->position -1;
                $otherSection->save();
            }
        }


        $section->delete();

        return redirect('/instructor/edit/' . $section->course_id)->with('success', 'Section Removed');
    }

    public function moveUp($sectionId)
    {

        // die kacke funktioniert noch nicht
        $section = Section::find($sectionId);
        $course = Course::find($section->course_id);

        foreach ($course->sections as $csection) {
            if ($csection->position == $section->position -1) {
                $id = $csection->id;
            }
        }

        $upperSection = Section::find($id);

        $upperSection->position = $upperSection->position + 1;
        $section->position = $section->position - 1;
        $upperSection->save();
        $section->save();


        return redirect('/instructor/edit/' . $section->course_id)->with('success', 'Section moved Upwards');
    }



}
