@extends('layouts.app')

@section('instructorContent')

@include('instructor.sidebar')

<div class="col-md-8">

    <h1>My Courses</h1>


    {{-- looking if user has created any courses --}}
    @if(count($courses) > 0)
        @foreach ($courses as $course)
            <div class="pt-3">
                <div class="card pb-1">
                    <h3>{{ $course->title }}</h3>
                    <p><b>status of the course: {{ $course->status }}</b></p>
                    <small>Last updated at {{ $course->updated_at }}</small>
                    <br>
                    <div class="card-item">
                        <a href="/instructor/edit/{{ $course->id }}" class="btn btn-primary float-left">Edit</a>


                        {{-- delete modal --}}

                        <button type="button" class="btn btn-danger float-left" data-toggle="modal" data-target="#exampleModal">
                            Delete
                        </button>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete {{ $course->title }} ?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No i don't want to delete it</button>
                            {!!Form::open(['action' => ['CoursesController@destroy', $course->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                            {!!Form::close()!!}
                          </div>
                        </div>
                      </div>
                    </div>

                </div>

        @endforeach
        {{-- pagination --}}
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
