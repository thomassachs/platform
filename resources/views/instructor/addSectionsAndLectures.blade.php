<div class="">

    here u can add and remove lectures and sections

    <br><br>

    datenbank für lectures und sections schon erstellt aber noch nicht implementiert
<br><br>
</div>
        {{-- create a new section --}}
        {!! Form::open(['action' => ['SectionsController@create', $course->id], 'method' => 'GET']) !!}
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Create new Section</span>
          </div>
            {{ Form::text('sectionName', '', ['class' => 'form-control', 'placeholder' => 'Section Name']) }}
            {{-- {{ Form::hidden('_method', 'PUT') }} --}}
            {{ Form::submit('Create Section', ['class' => 'btn btn-primary']) }}
        </div>
        {!! Form::close() !!}


        <br><br><br><br>

        {{-- echo sections and lectures --}}
        @foreach ($course->sections as $section)
            <div class="card bg-seco mb-3" style="width: 100%;">
                <div class="card-header">{{ $section->position }}. {{ $section->name }}
                    <button type="button" class="btn btn-primary float-right" name="button" data-toggle="modal" data-target="#addLectureModal{{ $section->id }}">add lecture</button>
                    <button type="button" class="btn btn-secondary float-right mr-3" name="button" data-toggle="modal" data-target="#renameSectionModal{{ $section->id }}">rename section</button>
                    <button type="button" class="btn btn-danger float-right mr-3" name="button" data-toggle="modal" data-target="#deleteSectionModal{{ $section->id }}"><i class="fas fa-trash-alt"></i></button>
                    @if ($course->sections->max('position') != $section->position)
                        <button type="button" name="button" class="btn btn-primary float-right mr-3"><i class="fas fa-arrow-down"></i></button>
                    @endif
                    @if ($section->position != 1)
                        <a href="{{ action('SectionsController@moveUp', $section->id) }}" class="btn btn-primary float-right mr-3">
                            <i class="fas fa-arrow-up"></i>
                        </a>
                    @endif
                </div>

                {{-- modal for delete section --}}
                @include('instructor.modals.deleteSectionModal')
                {{-- modal for rename section --}}
                @include('instructor.modals.renameSectionModal')
                {{-- modal for addLecture --}}
                @include('instructor.modals.addLectureModal')

                {{-- check if lectures for this section exists --}}
                @if (count($section->lectures) > 0)
                    <div class="card-body">
                        @foreach ($section->lectures as $lecture)
                            <div class="card-item">
                                @if ($lecture->position != 1)
                                    <hr>
                                @endif
                                <div class="ml-5">
                                    {{ $section->position }}.{{ $lecture->position }} <span class="ml-4">{{ $lecture->name }}</span>
                                </div>

                            </div>
                        @endforeach
                    </div>
                @endif

            </div>
        @endforeach
