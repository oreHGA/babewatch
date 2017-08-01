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
             <h1>Hey, {{session('user_name')}}. Manage your authorized friends below </h1> 
        </div>
        <form class="col-sm-4" action="{{ rtrim(config('app.url'), '/') }}/addfriend" method="POST" class="form" enctype="multipart/form-data">
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
                <input type="submit" id="addfriend" value="Add Friend" class="btn btn-primary"  style="background-color:#030303;" >
                <span class="fa fa-spin fa-spinner" id="verify_spinner" style="display:none;" aria-hidden="true"></span>
            </div>
        </form>

        <div class="col-sm-4">

            {{-- Get all the friends and feed theme to the blade template, then loop through them   --}}
            @if($friends)
                <p>Here's a list of people authorized to see your babe</p>
                @foreach($friends as $friend)
                    <p> {{$friend->firstname }}</p>
                @endforeach
            @else
                <p>Looks like you haven't added any friends yet</p>
            @endif
        </div>
        <form action="" class="col-sm-4 form"></form>
    </div>
@endsection