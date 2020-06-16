@extends('layouts.app')

@section('instructorContent')

@include('instructor.sidebar')

<div class="col-md-8">

    {{-- this is for the alerts when somebody passes the form incorrectly --}}
    @include('inc.messages')

    <h1>Create a new Course</h1>

    @if ($coursesInProgress < 5)
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
    @else
        <p>We are sorry to tell you, but you can only have 5 courses with the status "inprogress" at the same time. Before You can create another course you have to delete one
        or finish a course</p>
    @endif







</div>

    <!-- end row from sidebar -->
    </div>

@endsection('instructorContent')
