<!-- Modal delete section-->
<div class="modal fade" id="deleteSectionModal{{ $section->id }}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addLectureModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete section <b>{{ $section->position }}. {{ $section->name }}</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <br>

      {{-- add lecture form --}}

      <div class="modal-body">
          Are you sure you want to delete the whole section <b>including all lectures?</b>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, bring me back</button>
        {!!Form::open(['action' => ['SectionsController@destroy', $section->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
            {{Form::submit('Delete the whole section', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
      </div>




    </div>
  </div>
</div>
