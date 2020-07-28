@extends('layouts.app')

@section('content')

this is the front page <i class="fas fa-star"></i>
<br>
26.07. admin logik hinzugefügt auf /admin ist nun der admin bereich dieser ist nur erreichbar wenn man admin ist (hab ich dir gegeben) <br> um einen kurs zu submitten musst du alle dinge erfüllen bis auf die 30 minuten marke der button wird klickbar sobald alles andere erfüllt ist

<br><br>




    <div class=" justify-content-center">

        <h2>Approved Courses</h2>

        @foreach ($courses as $course )

            <div class="card">
                <div class="card">
                    <div class="row">
                        <div class="col-md-3">

                            @if (!empty($course->imagePath))
                                <img src="{{ config('app.storage') }}/courses/{{ $course->status }}/{{ $course->storageName }}/{{ $course->imagePath }}" width="250" height="150" alt="no image found">
                            @else
                                <img src="/storage/inc/demo-1.jpg" width="250" height="150" alt="">
                            @endif

                        </div>
                        <div class="col-md-6">
                            <h2><u><a href="/course/{{ $course->storageName }}">{{ $course->title }}</a></u></h2>
                            <br>
                            <p class="text-success">status: {{ $course->status }}</p>
                            <small class="text-secondary">
                                {{ count($course->lectures) }}
                                @if (count($course->lectures) == 1)
                                    Lecture
                                @else
                                    Lectures
                                @endif
                            </small><br>
                            <small class="text-secondary">Course length: {{ $course->course_duration }}</small>
                        </div>
                        <div class="col-md-3">
                            Preview:

                            <br>
                            <br>
                            Price: {{ $course->price }}

                        </div>
                    </div>
                </div>
            </div>

        @endforeach






    </div>


@endsection('content')
