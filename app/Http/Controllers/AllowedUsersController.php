<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AllowedUsers;
use App\Models\APIModel;

class AllowedUsersController extends Controller
{
    protected $api_model;

    public function __construct(){
        $this->api_model = new APIModel();
    }
    
    public function addFriend(Request $r){
        $friend = new AllowedUsers([
            'firstname' => $r->friend_name,
            'babe_id' => session('user_id'),
            'uuid' => uniqid('friend_' . session('user_id') . '_'),
        ]);
        $friend->save();
        // TODO: Save image locally and then pass the full url as a parameter to the function
        // Right now the images aren't being saved locally but rather just sennt straight to kairos
        $image = $r->file('picture');
        $status = $this->api_model->addImageToGallery($image, $friend->firstname , session('gallery_name'));
        return back()->with('status', $friend->firstname . 'has been added');
    }
}
