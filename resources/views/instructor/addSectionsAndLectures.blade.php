<div class="">

    here u can add and remove lectures and sections

    <br><br>

    datenbank für lectures und sections schon erstellt aber noch nicht implementiert
<br><br>
</div>

        {{-- create a new section --}}
        {!! Form::open(['action' => ['SectionsController@update', $course->id], 'method' => 'POST']) !!}
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Create new Section</span>
          </div>

            {{ Form::text('sectionName', '', ['class' => 'form-control', 'placeholder' => 'Section Name']) }}
            {{ Form::hidden('_method', 'PUT') }}
            {{ Form::submit('Create Section', ['class' => 'btn btn-primary']) }}
        {!! Form::close() !!}
