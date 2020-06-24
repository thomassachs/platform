<!-- Modal delete lecture-->
<div class="modal fade" id="deleteLectureModal{{ $lecture->id }}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="deleteLectureModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete lecture <b>{{ $lecture->position }}. {{ $lecture->name }}</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <br>

      {{-- add lecture form --}}

      <div class="modal-body">
          Are you sure you want to delete the lecture?
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, bring me back</button>
        {!!Form::open(['action' => ['LecturesController@destroy', $lecture->id], 'method' => 'GET', 'class' => 'pull-right'])!!}
            {{Form::submit('Delete the lecture', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
      </div>




    </div>
  </div>
</div>
