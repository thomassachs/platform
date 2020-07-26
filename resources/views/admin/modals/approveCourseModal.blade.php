<!-- Modal approve course-->
<div class="modal fade" id="approveCourseModal{{ $course->id }}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addLectureModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Approve <b>{{ $course->title }}</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <br>

      {{-- add lecture form --}}

      <div class="modal-body">
          Are you sure you want to approve the course
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, bring me back</button>
        {!!Form::open(['action' => ['AdminsController@approveCourse', $course->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
            {{Form::submit('Approve Course', ['class' => 'btn btn-primary'])}}
        {!!Form::close()!!}
      </div>




    </div>
  </div>
</div>
