<!-- Modal rename section-->
<div class="modal fade" id="submitCourseModal" tabindex="-1" role="dialog" aria-labelledby="submitCourseModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to submit your course?</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      {{-- rename section form --}}
      {!! Form::open(['action' => ['CoursesController@submitCourse', $course->id], 'method' => 'POST']) !!}
      <div class="modal-body">


      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {{ Form::submit('Submit Course', ['class' => 'btn btn-primary']) }}
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
