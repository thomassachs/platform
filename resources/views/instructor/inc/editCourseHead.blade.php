<div class="card">
    <div class="row">
        <div class="col-md-3">

            @if (!empty($course->imagePath))
                <img src="/storage/courses/{{ $course->status }}/{{ $course->storageName }}/{{ $course->imagePath }}" width="250" height="150" alt="">
            @else
                <img src="/storage/inc/demo-1.jpg" width="250" height="150" alt="">
            @endif

        </div>
        <div class="col-md-6">
            <h2><u>{{ $course->title }}</u></h2>
            <br>
            <br>
            <p class="text-success">status: {{ $course->status }}</p>

        </div>
    </div>
</div>
<br>
