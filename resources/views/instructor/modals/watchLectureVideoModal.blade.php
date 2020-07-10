<!-- Modal watch lecture video-->
<div class="modal fade" id="watchLectureVideoModal{{ $lecture->id }}" tabindex="-1" role="dialog" aria-labelledby="renameLectureModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Watch <b>{{ $lecture->position }}. {{ $lecture->name }}</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <video width="100%" height="100%" controls>
            <source src="/storage/courses/{{ $course->status }}/{{ $course->storageName }}/{{ $lecture->videopath }}" type="video/mp4">
            <source src="movie.ogg" type="video/ogg">
            Your browser does not support the video tag.
        </video>

    </div>
    
  </div>
</div>
