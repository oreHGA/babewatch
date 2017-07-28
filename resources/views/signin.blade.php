@extends('layouts.app')

@section('title')
Sign in
@endsection

@section('content')
    @if(session('status'))
        <div class="alert alert-danger alert-dismissable fade in">
        {{ session('status') }}
        </div>
    @endif

    <div class="login-page">
        <div class="form">
            <form method="POST" action="{{ rtrim(config('app.url'), '/') }}/babe" class="register-form">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <p>👶🏾</p>
                <input type="text" name="username" placeholder="name"/>
                <input type="text" id="first_email" name="email" placeholder="email address"/>
                <input type="text" id="second_email" name="verify_email" placeholder="re-type email address"/>
                <p id="email_error" style="color: red; display:none;">Email addresses do not match</p>
                <input type="password" name="password" id="first_pass" placeholder="password"/>
                <input type="password"  name="verify_password" id="second_pass" placeholder="re-type password"/>
                <p id="pass_error" style="color: red; display:none;">Passwords do not match</p>
                <button type="submit">sign up</button>
                <p class="message">Already registered? <a href="#">Sign In</a></p>
            </form>
            <form method="POST" action="{{ rtrim(config('app.url'), '/') . '/authenticate'}}" class="login-form">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <p>👶🏾</p>
                <input type="text" name="email" placeholder="email"/>
                <input type="password" name="password" placeholder="password"/>
                <button type="submit">login</button>
                <p class="message">Not registered? <a href="#">Create an account</a></p>
            </form>
        </div>
    </div>
@endsection