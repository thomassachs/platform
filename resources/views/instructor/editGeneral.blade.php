@extends('layouts.app')

@section('instructorContent')

@include('instructor.sidebar')

<div class="col-md-8">

    {{-- this is for the alerts when somebody passes the form incorrectly --}}
    @include('inc.messages')

    @include('instructor.inc.editCourseHead')

    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" href="">General</a>
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
        <a class="nav-link" href="/instructor/edit/{{ $course->id }}/submit">Submit</a>
      </li>
    </ul>

    <div class="row">
        <div class="col-md-6">
            {{-- general tab --}}
            <div class="tab-content" id="myTabContent">
                <br>
                <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">

                  {!! Form::open(['action' => ['CoursesController@update', $course->id], 'method' => 'POST']) !!}
                      <div class="form-group">
                          {{ Form::label('title', 'Title') }}
                          {{ Form::text('title', $course->title, ['class' => 'form-control', 'placeholder' => 'Title']) }}
                      </div>
                      <div class="form-group">
                          {{ Form::label('language', 'Language') }}
                          {{ Form::text('language', $course->language, ['class' => 'form-control', 'placeholder' => 'Language']) }}
                      </div>
                      <div class="form-group">
                          {{ Form::label('game', 'Name of the Game') }}
                          {{ Form::text('game', $course->game, ['class' => 'form-control', 'placeholder' => 'Gamename']) }}
                      </div>
                      {{ Form::hidden('_method', 'PUT') }}
                      {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <br>
            <p>Your current Course Thumbnail:</p>
            @if (!empty($course->imagePath))
                <img src="{{ config('app.storage') }}/courses/{{ $course->status }}/{{ $course->storageName }}/{{ $course->imagePath }}" width="300" height="200" alt="">
            @else
                <img src="/storage/inc/demo-1.jpg" width="300" height="200" alt="">
            @endif

        </div>
        <div class="col-md-3">
            <br><br><br>
            {!! Form::open(['action' => ['CoursesController@changeImage', $course->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}


            {{ Form::submit('Change Image', ['class' => 'btn btn-primary']) }}

            {{ Form::file('image') }}

            {!! Form::close() !!}
        </div>
    </div>
</div>


    <!-- end row from sidebar -->
    </div>

@endsection('instructorContentcontent')
