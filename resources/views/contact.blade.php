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
            <h1>Hey {{ session('user_name')}}, wanna reach us to discuss pressing issues? </h1>
            <h2>Send us an email at support@babewatch.ng</h2>
            <h2>We promise to reply within 24 hours</h2>

            <form action="" method="POST" class="form">
            
            </form>
        </div>            
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/babewatch.js') }}"></script>
@endsection