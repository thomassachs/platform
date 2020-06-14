@extends('layouts.app')

@section('instructorContent')

@include('instructor.sidebar')

<div class="col-md-10">

    <h1>My Courses</h1>


    {{-- looking if user has created any courses --}}
    @if(count($courses) > 0)
        @foreach ($courses as $course)
            <div class="card">
                <h3>{{ $course->title }}</h3>

                <small>Last updated at {{ $course->updated_at }}</small>
                <br>
                <div class="card-item">
                    <a href="/instructor/edit/{{ $course->id }}" class="btn btn-primary">Edit</a>
                </div>
            </div>
            <br><br>
        @endforeach
        {{ $courses->links() }}
    @else
        <p>You dont have any courses yet</p>
    @endif

</div>
    <!-- end row from sidebar -->
    </div>

@endsection('instructorContentcontent')
