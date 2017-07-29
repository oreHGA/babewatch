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

    {{-- Here is where the authorization / verification will take place   --}}

    <div class="container" style="margin-top:20px;" >
        <div id="camera" style="height:500px;"></div>
        <div class="row" style="text-align: center;">
        <button id="capture"  style="background-color:#030303;border-color:#030303;"  class="btn btn-info btn-lg" style="margin-top:10px;">Capture</capture> 
        <span class="fa fa-spin fa-spinner" id="verify_spinner" style="display:none;" aria-hidden="true"></span>
        </div>
    </div>

    <button style="display: none;" id="modalToggler" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#popup-modal">Open Modal</button>

    <div class="modal fade" id="popup-modal" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color:#030303; color: white;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">
                Modal Header
            </h4>
            </div>
            <div class="modal-body">
            <p>Main form data will be here</p>
            </div>
            <div class="modal-footer">
            <button type="button" style="background-color:#030303;" class="btn btn-info btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('js/webcam.min.js') }}"></script>
    <script src="{{ asset('js/webcam.swf') }}"></script>
    <script src="{{ asset('js/babewatch.js') }}"></script>
@endsection