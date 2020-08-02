@extends('layouts.app')

@section('content')


<div class="">
    this is the course {{$course->title}} and it has {{ count($course->lectures) }} lectures <a href="/course/{{ $course->storageName }}/checkout" class="btn btn-primary">buy now</a>
</div>


@endsection('content')
