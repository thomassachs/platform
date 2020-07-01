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
        <a class="nav-link active" href="">Description</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/instructor/edit/{{ $course->id }}/lectures">Lectures</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/instructor/edit/{{ $course->id }}/pricing">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/instructor/edit/{{ $course->id }}/submit">Submit</a>
      </li>
    </ul>


      {{-- description tab --}}
      <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">


          description
          <div class="">
            <video width="320" height="240" controls>
                <source src="/storage/courses/inprogress/besser werden in lol/5aa3fa34cee2fdogs_1593264004.mp4" type="video/mp4">
            Your browser does not support the video tag.
            </video>
            <img style="width:100%" src="/storage/courses/inprogress/besser werden in lol/thumb-1920-673431_1593263850.jpg" alt="">
          </div>

      </div>

    </div>


</div>

    <!-- end row from sidebar -->
    </div>

@endsection('instructorContentcontent')
