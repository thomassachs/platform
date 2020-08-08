@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! You can logout
                    <a class="" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                         here
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <h2>My Courses:</h2>

    <div class="">
        @foreach ($user->payments as $payment)
            <br>
            <h5>{{ $payment->course->title }}</h5>
            <br>
            @foreach ($payment->course->sections as $section)
                {{-- {{ $section->name }} --}}
            @endforeach
            <br>
        @endforeach
    </div>
</div>
@endsection
