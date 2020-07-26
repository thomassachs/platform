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
        <a class="nav-link active" href="">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/instructor/edit/{{ $course->id }}/submit">Submit</a>
      </li>
    </ul>

    <div class="row">
        <div class="col-md-6">
            {{-- general tab --}}
            <div class="tab-content" id="myTabContent">
                <p>the current price for your course is: {{ $course->price }}</p>
                <br><br><br>
                you can change the price here: <div class="input-group mb-3">
                    {!! Form::open(['action' => ['CoursesController@editPrice', $course->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                    <div class="input-group mb-3">

                        {!! Form::select('price',['0' => '0$','4.99' => '4.99$','9.99'=>'9.99$','14.99'=>'14.99$','19.99'=>'19.99$'],$course->price . '$',['class'=>'form-control','placeholder'=>$course->price. '$']) !!}
                        {{ Form::submit('Change Price', ['class' => 'btn btn-primary']) }}
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
