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
                        <div class="container-fluid">

                            kommt noch
                        </div>
                    </div>
                    @include('instructor.inc.footer')
                </div>


@endsection
