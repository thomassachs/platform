@extends('layouts.app')

@section('instructorContent')

@include('instructor.sidebar')

<div class="col-md-10">

    {{-- this is for the alerts when somebody passes the form incorrectly --}}
    @include('inc.messages')

    <h1>Edit {{ $course->title }}</h1>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">General</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="false">Description</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="lectures-tab" data-toggle="tab" href="#lectures" role="tab" aria-controls="lectures" aria-selected="false">Lectures</a>
      </li>
    </ul>


    <div class="tab-content" id="myTabContent">
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

      <div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="description-tab">


          description


      </div>
      <div class="tab-pane fade" id="lectures" role="tabpanel" aria-labelledby="lectures-tab">...</div>
    </div>


</div>

    <!-- end row from sidebar -->
    </div>

@endsection('instructorContentcontent')
