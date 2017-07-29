@extends('layouts.registered')

@section('title')
Home
@endsection

@section('content')

    @if(session('status'))
        <div class="alert alert-success alert-dismissable fade in">
        {{ session('status') }}
        </div>
    @endif
    <div class="container">
        <div class="row">
            <p>Hi, {{ session('user_name')}}. Your babe is in safe hands 😉</p>
        </div>            
    </div>

    {{-- Here is where the authorization / verification will take place   --}}

    <div class="container" style="width:500px">
        <img src="{{  asset('black_baby_smiling.jpg') }}" alt="" class="img-responsive">
    </div>

@endsection

@section('js')
    <script src="{{ asset('js/babewatch.js') }}"></script>
@endsection