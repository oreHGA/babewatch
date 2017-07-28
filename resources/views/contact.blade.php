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
            <h1>Wanna reach us to discuss pressing issues? </h1>
            <h2>Send us an email at support@babewatch.ng or fill the form below</h2>
            <h2>We promise to reply within 24 hours</h2>
            <p>Hi, {{ session('user_name')}}. Your baby is in safe hands 😉</p>
        </div>            
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/babewatch.js') }}"></script>
@endsection