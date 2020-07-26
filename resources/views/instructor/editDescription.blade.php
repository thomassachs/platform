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

          <br><br>

          {{-- add what you will learn for course --}}
          {!! Form::open(['action' => ['DescriptionItemsController@addLearnGoal', $course->id], 'method' => 'POST']) !!}
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Add learn goal</span>
            </div>
              {{ Form::text('learnGoal', '', ['class' => 'form-control', 'placeholder' => 'You will learn to be a ninja']) }}
              {{ Form::submit('Add learn goal', ['class' => 'btn btn-primary']) }}
          </div>
          {!! Form::close() !!}

          {{-- add requirement for course --}}
          {!! Form::open(['action' => ['DescriptionItemsController@addRequirement', $course->id], 'method' => 'POST']) !!}
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Add Requirement</span>
            </div>
              {{ Form::text('requirement', '', ['class' => 'form-control', 'placeholder' => 'You need to be at least 1.70m tall']) }}
              {{ Form::submit('Add Requirement', ['class' => 'btn btn-primary']) }}
          </div>
          {!! Form::close() !!}

          {{-- add or edit description for course --}}
          {!! Form::open(['action' => ['CoursesController@editDescription', $course->id], 'method' => 'POST']) !!}
              <div class="form-group">
                  {{ Form::label('description', 'Description') }}
                  {{ Form::textarea('description', $course->description, ['class' => 'form-control', 'placeholder' => $course->description]) }}
              </div>

              {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
          {!! Form::close() !!}

          <br><br><br>

          <div class="">
              <h3>What you will learn</h3>
              @foreach ($course->descriptionItems as $descriptionItem)
                  @if ($descriptionItem->type == "learnGoal")
                      <li class="ml-5">{{ $descriptionItem->content }}</li>
                  @endif
              @endforeach

              <h3>Requirements</h3>
              @foreach ($course->descriptionItems as $descriptionItem)
                  @if ($descriptionItem->type == "requirement")
                      <li class="ml-5">{{ $descriptionItem->content }}</li>
                  @endif
              @endforeach

              <h3>Description</h3>
              {{ $course->description }}

          </div>
      </div>


</div>




    <!-- end row from sidebar -->
    </div>

@endsection('instructorContentcontent')
