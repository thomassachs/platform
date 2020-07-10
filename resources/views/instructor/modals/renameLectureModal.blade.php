<!-- Modal rename lecture-->
<div class="modal fade" id="renameLectureModal{{ $lecture->id }}" tabindex="-1" role="dialog" aria-labelledby="renameLectureModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rename the Lecture <b>{{ $lecture->position }}. {{ $lecture->name }}</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      {{-- rename lecture form --}}
      {!! Form::open(['action' => ['LecturesController@rename', $lecture->id, $course->id], 'method' => 'POST']) !!}
      <div class="modal-body">

          <div class="form-group mb-3">
              {{ Form::label('lectureName', 'Name of your new lecture') }}
              {{ Form::text('lectureName', '', ['class' => 'form-control', 'placeholder' => 'new name']) }}
          </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {{ Form::submit('Rename Lecture', ['class' => 'btn btn-primary']) }}
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
