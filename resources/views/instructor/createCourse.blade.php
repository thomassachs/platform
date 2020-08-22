@extends('layouts.app')

@section('stylesheets')
    <link href="{{ asset('css/instructor-dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/instructor-responsive.css') }}" rel="stylesheet">
@endsection

@section('scripts')
    <script src="{{ asset('js/custom1.js') }}"></script>
@endsection

@section('instructorContent')

    <div class="wrapper">
		<div class="sa4d25">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h2 class="st_title"><i class="uil uil-analysis"></i> Create New Course</h2>
					</div>
				</div>
                @include('inc.messages')
				<div class="row">
					<div class="col-12">
						<div class="">
							<div id="add-course-tab" class="step-app">
								<div class="step-content">
									<div class="step-tab-panel step-tab-info active" id="tab_step1">
										<div class="tab-from-content">
											<div class="course__form">
												<div class="general_info10">

                                                    {!! Form::open(['action' => 'CoursesController@store', 'method' => 'POST']) !!}
    													<div class="row">
    														<div class="col-lg-6 col-md-6">
    															<div class="ui search focus mt-30 lbel25">
    																<label>Course Title*</label>
    																<div class="ui left icon input swdh19">
                                                                        {{ Form::text('title', '', ['class' => 'prompt srch_explore', 'placeholder' => 'Insert your course title.']) }}
    																	<div class="badge_num">60</div>
    																</div>
    															</div>
    														</div>
    														<div class="col-lg-6 col-md-6">
    															<div class="ui search focus mt-30 lbel25">
    																<label>Course Subtitle* - momentan ein unnützes feld</label>
    																<div class="ui left icon input swdh19">
    																	<input class="prompt srch_explore" type="text" placeholder="Insert your course Subtitle." name="subtitle" data-purpose="edit-course-title" maxlength="60" id="sub[title]" value="">
    																	<div class="badge_num2">120</div>
    																</div>
    															</div>
    														</div>
    														<div class="col-lg-4 col-md-12">
    															<div class="mt-30 lbel25">
    																<label>Language*</label>
    															</div>
                                                                {!!  Form::select('language',['English' => 'English','German' => 'German'],null,
                                                                    ['class'=>'ui hj145 dropdown cntry152 prompt srch_explore','placeholder'=>'Select Language']) !!}
    														</div>
    														<div class="col-lg-4 col-md-6">
    															<div class="mt-30 lbel25">
    																<label>Name of the Game*</label>
    															</div>
                                                                {!!  Form::select('game',['League of Legends' => 'League of Legends','Legends of Runeterra' => 'Legends of Runeterra'],null,
                                                                    ['class'=>'ui hj145 dropdown cntry152 prompt srch_explore','placeholder'=>'Select Language']) !!}
    														</div>
    														<div class="col-lg-4 col-md-6">
    															<div class="mt-30 lbel25">
    																<label>Course Subcategory* - momentan ein unnützes feld</label>
    															</div>
    															<select class="ui hj145 dropdown cntry152 prompt srch_explore">
    																<option value="">Select Subcategory</option>
    																<option value="1">Javascript</option>
    																<option value="2">Angular</option>
    															</select>
    														</div>
    													</div>
                                                        <div class="step-footer step-tab-pager">
                                                            {{ Form::submit('Create Course', ['class' => 'btn btn-default steps_btn']) }}
                        								</div>
                                                    {!! Form::close() !!}

												</div>
											</div>
										</div>
									</div>


								</div>
							</div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>

@endsection('instructorContent')
