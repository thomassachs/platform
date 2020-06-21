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

}
