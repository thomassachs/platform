@extends('layouts.app')

@section('instructorContent')

@include('instructor.sidebar')

<div class="col-md-10">

    {{-- this is for the alerts when somebody passes the form incorrectly --}}
    @include('inc.messages')

    <h1>Edit {{ $course->title }}</h1>

    {!! Form::open(['action' => ['CoursesController@update', $course->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{ Form::label('title', 'Title*') }}
            {{ Form::text('title', $course->title, ['class' => 'form-control', 'placeholder' => 'Title']) }}
        </div>
        <div class="form-group">
            {{ Form::label('language', 'Language*') }}
            {{ Form::text('language', $course->language, ['class' => 'form-control', 'placeholder' => 'Language']) }}
        </div>
        <div class="form-group">
            {{ Form::label('game', 'Name of the Game*') }}
            {{ Form::text('game', $course->game, ['class' => 'form-control', 'placeholder' => 'Gamename']) }}
        </div>
        {{ Form::hidden('_method', 'PUT') }}
        {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
    {!! Form::close() !!}

    laravel part 8 minute 3:50 für put spoof

</div>

    <!-- end row from sidebar -->
    </div>

@endsection('instructorContentcontent')
