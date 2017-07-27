@extends('layouts.app')

@section('title')
Add Friends
@endsection

@section('content')
    <div class="container">
        <div class="row">
             <p>Hey, {{session('user_email')}}. Add your friends below </p> 
        </div>
        <form action="{{ rtrim(config('app.url'), '/') }}/addfriend" method="POST" class="form" enctype="multipart/form-data">
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