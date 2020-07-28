@extends('layouts.app')

@section('content')


<div class="">
    this is the course {{$course->title}} and it has {{ count($course->lectures) }} lectures
</div>


@endsection('content')
