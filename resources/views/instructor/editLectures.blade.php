@extends('layouts.app')

@section('instructorContent')

@include('instructor.sidebar')

<div class="col-md-8">

    {{-- this is for the alerts when somebody passes the form incorrectly --}}
    @include('inc.messages')

    @include('instructor.inc.editCourseHead')

    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link " href="/instructor/edit/{{ $course->id }}/general">General</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/instructor/edit/{{ $course->id }}/description">Description</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" id="lectures-tab" data-toggle="tab" href="#lectures" role="tab" aria-controls="lectures" aria-selected="true">Lectures</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/instructor/edit/{{ $course->id }}/pricing">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/instructor/edit/{{ $course->id }}/submit">Submit</a>
      </li>
    </ul>

    


      {{-- lectures tab --}}
      <div class="tab-pane fade show active" id="lectures" role="tabpanel" aria-labelledby="lectures-tab">

            @include('instructor.addSectionsAndLectures')

      </div>
    </div>


</div>

    <!-- end row from sidebar -->
    </div>

@endsection('instructorContentcontent')
