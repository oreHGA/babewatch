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
@endsection

@section('js')
    <script src="{{ asset('js/babewatch.js') }}"></script>
@endsection