<!-- Modal rename section-->
<div class="modal fade" id="renameSectionModal{{ $section->id }}" tabindex="-1" role="dialog" aria-labelledby="renameSectionModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rename the section <b>{{ $section->position }}. {{ $section->name }}</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      {{-- rename section form --}}
      {!! Form::open(['action' => ['SectionsController@rename', $section->id, $course->id], 'method' => 'GET']) !!}
      <div class="modal-body">

          <div class="form-group mb-3">
              {{ Form::label('sectionName', 'Name of your new section') }}
              {{ Form::text('sectionName', '', ['class' => 'form-control', 'placeholder' => 'new name']) }}
          </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {{ Form::submit('Rename Section', ['class' => 'btn btn-primary']) }}
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
