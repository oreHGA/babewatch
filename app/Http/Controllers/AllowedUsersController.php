<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AllowedUsers;

class AllowedUsersController extends Controller
{
    public function addFriend(Request $r){
        $username = session('user_email');

        $friend = new AllowedUsers([
            'firstname' => $r->friend_name,
            'babe_id' => session('user_id'),
            'uuid' => uniqid('friend_' . session('user_id') . '_'),
        ]);
        $friend->save();

        // TODO: So now the picture has to be sent to the kairo api and saved in the gallery for user
        
        return back()->with('status', $friend->firstname . 'has been added');
    }
}
