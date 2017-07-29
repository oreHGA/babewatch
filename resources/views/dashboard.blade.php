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

    <div class="container" >
        <div id="camera" style="height:500px;"></div>
        <div class="row" style="text-align: center;">
        <button id="capture" class="btn btn-primary">Capture</capture> 
        </div>
    </div>

    <script>
    </script>

@endsection

@section('js')
    <script src="{{ asset('js/webcam.min.js') }}"></script>
    <script src="{{ asset('js/webcam.swf') }}"></script>
    <script src="{{ asset('js/babewatch.js') }}"></script>
@endsection