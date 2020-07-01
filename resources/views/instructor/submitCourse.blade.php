@extends('layouts.app')

@section('instructorContent')

@include('instructor.sidebar')

<div class="col-md-8">

    {{-- this is for the alerts when somebody passes the form incorrectly --}}
    @include('inc.messages')

    @include('instructor.inc.editCourseHead')

    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link" href="/instructor/edit/{{ $course->id }}/general">General</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/instructor/edit/{{ $course->id }}/description">Description</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/instructor/edit/{{ $course->id }}/lectures">Lectures</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/instructor/edit/{{ $course->id }}/pricing">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="">Submit</a>
      </li>
    </ul>

    <div class="row">
        <div class="col-md-6">
            {{-- general tab --}}
            <div class="tab-content" id="myTabContent">
                here u submit ur course
            </div>
        </div>
        <div class="col-md-3">


        </div>
        <div class="col-md-3">

        </div>
    </div>
</div>


    <!-- end row from sidebar -->
    </div>

@endsection('instructorContentcontent')
