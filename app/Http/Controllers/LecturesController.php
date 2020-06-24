<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lecture;
use App\Section;

class LecturesController extends Controller
{

    public function store(Request $request, $sectionId, $courseId)
    {

        $this->validate($request, [
            'lectureName' => ['required', 'max:255'],
        ]);

        $section = Section::find($sectionId);

        $lecture = new Lecture;
        $lecture->name = $request->input('lectureName');
        $lecture->section_id = $sectionId;
        $lecture->position = 1 + count($section->lectures);
        $lecture->type = 'video';
        $lecture->videopath = 0;


        $lecture->save();

        return redirect('/instructor/edit/' . $courseId)->with('success', 'lecture created succesfully');
    }

    public function moveUp($lectureId)
    {

        $currentLecture = Lecture::find($lectureId);

        $section = Section::find($currentLecture->section_id);

        // set the section with higher position one position down
        foreach ($section->lectures as $otherLecture) {
            if($otherLecture->position == $currentLecture->position -1){
                $otherLecture->position = $otherLecture->position + 1;
                $otherLecture->save();
            }
        }


        $currentLecture->position = $currentLecture->position - 1;

        $currentLecture->save();

        return redirect('/instructor/edit/' . $section->course_id)->with('success', 'Lecture moved upwards' );
    }

    public function moveDown($lectureId)
    {

        $currentLecture = Lecture::find($lectureId);

        $section = Section::find($currentLecture->section_id);

        // set the section with higher position one position down
        foreach ($section->lectures as $otherLecture) {
            if($otherLecture->position == $currentLecture->position + 1){
                $otherLecture->position = $otherLecture->position - 1;
                $otherLecture->save();
            }
        }


        $currentLecture->position = $currentLecture->position + 1;

        $currentLecture->save();

        return redirect('/instructor/edit/' . $section->course_id)->with('success', 'Lecture moved downwards' );
    }

    public function destroy($id)
    {
        $lecture = Lecture::find($id);


        $section = Section::find($lecture->section_id);

        // set sections with higher position one position down
        foreach ($section->lectures as $otherLecture) {
            if($otherLecture->position > $lecture->position){
                $otherLecture->position = $otherLecture->position -1;
                $otherLecture->save();
            }
        }


        $lecture->delete();

        return redirect('/instructor/edit/' . $section->course_id)->with('success', 'Lecture Removed');
    }

}
