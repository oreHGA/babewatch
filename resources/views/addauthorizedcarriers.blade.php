@extends('layouts.registered')

@section('title')
Add Friends
@endsection

@section('content')
    @if(session('status'))
        <div class="alert alert-success alert-dismissable fade in">
        {{ session('status') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissable fade in">
        {{ session('error') }}
        </div>
    @endif
    <div class="container">
        <div class="row">
             <p>Hey, {{session('user_name')}}. Add your friends below </p> 
        </div>
        <form action="{{ rtrim(config('app.url'), '/') }}/addfriend" method="POST" class="form" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
                <label for="friend_name">Friend's Name</label>
                <input type="text" id="friend_name" name="friend_name" placeholder="Enter Friend's Name" class="form-control">
            </div>
            <div class="form-group">
                <label for="picture">Upload or take a picture of thy friend's face</label>
                <input type="file" id="picture" name="picture">
            </div>

            <div class="form-group">
                <input type="submit" value="Add Friend" class="btn btn-primary">
            </div
        </form>
    </div>
@endsection