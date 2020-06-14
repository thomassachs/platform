@extends('layouts.app')

@section('instructorContent')

@include('instructor.sidebar')

<div class="col-md-8">

    <h1>My Courses</h1>


    {{-- looking if user has created any courses --}}
    @if(count($courses) > 0)
        @foreach ($courses as $course)
            <div class="card">
                <h3>{{ $course->title }}</h3>
                <p><b>status of the course: {{ $course->status }}</b></p>
                <small>Last updated at {{ $course->updated_at }}</small>
                <br>
                <div class="card-item">
                    <a href="/instructor/edit/{{ $course->id }}" class="btn btn-primary">Edit</a>
                </div>

                    {!!Form::open(['action' => ['CoursesController@destroy', $course->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {!!Form::close()!!}
            </div>
            <br><br>
        @endforeach
        {{ $courses->links() }}
    @else
        <p>You dont have any courses yet</p>
    @endif

</div>
<div class="col-md-2">

</div>
    <!-- end row from sidebar -->
    </div>

@endsection('instructorContentcontent')
