<!-- Modal add lecture-->
<div class="modal fade" id="addLectureModal{{ $section->id }}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addLectureModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add a lecture to <b>{{ $section->position }}. {{ $section->name }}</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <br>

      {{-- add lecture form --}}
      {!! Form::open(['action' => ['LecturesController@store', $section->id, $course->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
      <div class="modal-body">

          <div class="form-group mb-3">
              {{ Form::label('lectureName', 'Name of your new lecture') }}
              {{ Form::text('lectureName', '', ['class' => 'form-control', 'placeholder' => 'new name']) }}
          </div>
          <div class="form-group mb-3 text-center">
              {{ Form::file('lectureVideo') }}
          </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {{ Form::submit('Add lecture', ['class' => 'btn btn-primary']) }}
      </div>
      {!! Form::close() !!}

    </div>
  </div>
</div>
