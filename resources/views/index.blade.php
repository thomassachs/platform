@extends('layouts.app')

@section('content')

this is the front pageeetttt
<i class="fas fa-star"></i>
{{-- {{Storage::url("/app/public/courses/inprogress/testkurss/11480c5bde9fd5786ef6d297c79a40ed_1593539535.jpg")}} --}}

<img src="{{Storage::url("/courses/inprogress/testkurss/11480c5bde9fd5786ef6d297c79a40ed_1594411698.jpg")}}" width="250" height="150" alt="no image found">

@endsection('content')
