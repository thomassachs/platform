@extends('layouts.app')

@section('instructorContent')

@include('instructor.sidebar')

<div class="col-md-8">

    {{-- this is for the alerts when somebody passes the form incorrectly --}}
    @include('inc.messages')

    <h1>Edit {{ $course->title }}</h1>

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
    </ul>

    {{-- general tab --}}
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade " id="general" role="tabpanel" aria-labelledby="general-tab">

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


      {{-- description tab --}}
      <div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="description-tab">


          description
          <div class="">
            <video width="320" height="240" controls>
                <source src="/storage/courses/inprogress/besser werden in lol/5aa3fa34cee2fdogs_1593264004.mp4" type="video/mp4">
            Your browser does not support the video tag.
            </video>
            <img style="width:100%" src="/storage/courses/inprogress/besser werden in lol/thumb-1920-673431_1593263850.jpg" alt="">
          </div>

      </div>


      {{-- lectures tab --}}
      <div class="tab-pane fade show active" id="lectures" role="tabpanel" aria-labelledby="lectures-tab">

            @include('instructor.addSectionsAndLectures')

      </div>
    </div>


</div>

    <!-- end row from sidebar -->
    </div>

@endsection('instructorContentcontent')
