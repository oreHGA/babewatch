@extends('layouts.app')

@section('title')
Sign in
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <p>Welcome, please sign in below or <a href="{{ rtrim(config('app.url'), '/') }}/babe/create"> Sign up </a> to continue</p>
        </div>

        <div method="POST" action="" class="form col-sm-6">
            <div> --->{{ rtrim(config('app.url'), '/') }}</div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Enter Email Here">
            </div>

            <div class="form-group">
                <label for="user_pass">Password</label>
                <input class="form-control" type="password" placeholder="Enter password">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary">
            </div>
        </div>
    </div>
@endsection