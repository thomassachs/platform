@extends('layouts.app')

@section('instructorContent')

@include('instructor.sidebar')

<div class="col-md-10">

    {{-- this is for the alerts when somebody passes the form incorrectly --}}
    @include('inc.messages')

    <h1>Create a new Course</h1>

    {!! Form::open(['action' => 'CoursesController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{ Form::label('title', 'Title*') }}
            {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title']) }}
        </div>
        <div class="form-group">
            {{ Form::label('language', 'Language*') }}
            {{ Form::text('language', '', ['class' => 'form-control', 'placeholder' => 'Language']) }}
        </div>
        <div class="form-group">
            {{ Form::label('game', 'Name of the Game*') }}
            {{ Form::text('game', '', ['class' => 'form-control', 'placeholder' => 'Gamename']) }}
        </div>
        {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
    {!! Form::close() !!}

    laravel part 7 minute 17 für ckeditor für die description

</div>

    <!-- end row from sidebar -->
    </div>

@endsection('instructorContentcontent')
