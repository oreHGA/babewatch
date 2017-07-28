@extends('layouts.app')

@section('title')
Sign Up
@endsection

@section('content')
    @if(session('status'))
        <div class="alert alert-success alert-dismissable fade in">
        {{ session('status') }}
        </div>
    @endif
    <div class="container">
        <div class="row">
            <p>Welcome, please fill in your details below to sign up</p>
        </div>
            <form action="{{ rtrim(config('app.url'), '/') }}/babe" method="POST" class="form">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <label for="username">Name</label>
                    <input type="text" id="username" name="username" placeholder="Enter First Name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="text" id="first_email" name="email" placeholder="Enter Email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="verify_email">Re-type Email Address</label>
                    <input type="text" id="second_email" name="verify_email" placeholder="Re-Enter Email" class="form-control">
                    <p id="email_error" style="color: red; display:none;">Email addresses do not match</p>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="first_pass"  placeholder="Enter Password"  class="form-control">
                </div>
                <div class="form-group" >
                    <label for="verify_password">Re-type Password</label>
                    <input type="password" name="verify_password" id="second_pass"  placeholder="Re-Enter Password" class="form-control">
                    <p id="pass_error" style="color: red; display:none;">Passwords do not match</p>
                </div>

                <div class="form-group">
                    <input type="submit" id="submit_button" class="btn btn-primary">
                </div
            </form>
            <p>Do you already have account? <a href="{{ rtrim(config('app.url'), '/') }}/babe"> Sign in </a> to continue</p>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/babewatch.js') }}"></script>
@endsection