@extends('layouts.app')

@section('content')


<div class="">
    this is the course {{$course->title}} and it has {{ count($course->lectures) }} lectures

    @if ($course->user_id != Auth::id())

        <a href="/course/{{ $course->storageName }}/checkout" class="btn btn-primary">buy now</a>
    @else
        <a href="/course/{{ $course->storageName }}/checkout" class="btn btn-primary disabled" >cant buy your own course</a>
    @endif

</div>


@endsection('content')
