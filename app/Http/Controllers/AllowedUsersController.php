<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AllowedUsers;
use App\Models\APIModel;
use App\Models\StorageModel;

class AllowedUsersController extends Controller
{
    protected $api_model;
    protected $storage_model;

    public function __construct(){
        $this->api_model = new APIModel();
        $this->storage_model = new StorageModel();
    }
    
    public function addFriend(Request $r){
        $friend = new AllowedUsers([
            'firstname' => $r->friend_name,
            'babe_id' => session('user_id'),
            'uuid' => uniqid('friend_' . session('user_id') . '_'),
        ]);
        $friend->save();
        // Right now the images aren't being saved locally but rather just sennt straight to kairos
        $image = $r->picture;
        $status = false;
        $upload_link = $this->storage_model->upload_object($friend->uuid, $image);
        if($upload_link){
            $status = $this->api_model->addImageToGallery($upload_link, $friend->firstname , session('gallery_name'));
        }
        if($status)
            return back()->with('status', $friend->firstname . ' has been added.' . 'They can now touch your babe');
        
        return back()->with('error', 'Unfortunately, something went wrong. Friend could not be added');
    }
}
