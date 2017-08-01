<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AllowedUsers;
use App\Models\APIModel;
use App\Models\StorageModel;
use App\Models\EmailModel;

class AllowedUsersController extends Controller
{
    protected $api_model;
    protected $storage_model;
    protected $email_sender;
    protected $friends_model;

    public function __construct(){
        $this->api_model = new APIModel();
        $this->storage_model = new StorageModel();
        $this->email_sender = new EmailModel();
        $this->friends_model = new AllowedUsers();
    }
    public function friendsList(Request $r){
        $friends = AllowedUsers::where('babe_id', session('user_id'))->get();
        return view('addauthorizedcarriers', ['friends' => $friends]);
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

        $upload_link = $this->storage_model->upload_object($friend->uuid, $image);
        if($upload_link){
            $response = $this->api_model->addImageToGallery($upload_link, $friend->firstname , session('gallery_name'));
        }
        
        if(!isset($response->Errors[0]->Message))
            return back()->with('status', $friend->firstname . ' has been added.' . 'They can now touch your babe');
        
        // dd($response->Errors[0]->Message);
        return back()->with('error', 'Error:' . $response->Errors[0]->Message);
    }

    public function verify(Request $r){
        $encodedData = str_replace(' ','+',$r->image);
        $decodedData = base64_decode($encodedData);
        $uri = substr($encodedData, strpos($encodedData, ',') + 1);
        $filepath = 'storage/suspects.png';

        file_put_contents($filepath, base64_decode($uri));
        $upload_link = $this->storage_model->upload_object('suspect', $filepath);
        if($upload_link){
            $response = $this->api_model->verifyUserFromGallery($upload_link, session('gallery_name'), 'suspect');
        }

        $result = [];
        
        if(isset($response->Errors[0]->Message)){
            $result['status'] = 'Fail';
            $result['message'] = $response->Errors[0]->Message;
        }else{
            if($response->images[0]->transaction->confidence > 0.6 ){
                // this means the user is good to go for now
                // send an email to the user  that someones in
                $result['status'] = 'Pass';
                $result['message'] = 'Eyy! You just passed verification. You may see the babe';
            }
            else{
                $result['status'] = 'Fail';
                $result['message'] = 'Sorry looks like you don\'t have access to the babe';
            }
        }                    
        // send an email before you return the json result to the user 
        $this->email_sender->statusUpdate( session('user_email'), $result['status'], $upload_link );
        return json_encode($result); 
    }
}
