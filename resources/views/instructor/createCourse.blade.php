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
            {{ Form::label('description', 'Description*') }}
            {{ Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Enter your description here']) }}
        </div>
        {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
    {!! Form::close() !!}


</div>
    <!-- end row from sidebar -->
    </div>

@endsection('instructorContentcontent')
