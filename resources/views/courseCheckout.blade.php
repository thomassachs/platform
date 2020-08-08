@extends('layouts.app')

@section('content')


<div class="">
    der kurs kostet {{ $course->price }} $
</div>

{{-- payment form --}}
{!! Form::open(['action' => ['PaymentController@charge', $course->id], 'method' => 'POST']) !!}

    {{ Form::submit('Pay with Paypal', ['class' => 'btn btn-primary']) }}

{!! Form::close() !!}

@endsection('content')
