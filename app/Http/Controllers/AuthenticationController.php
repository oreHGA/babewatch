<?php

namespace App\Http\Controllers;
use App\Models\Babe;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    //
    // to authenticate users
    public function authenticate(Request $request){
        $babe_model = Babe::where('email', $request->email)->first();
        $hashed_pass = password_hash($request->password, CRYPT_BLOWFISH);

        if(!$babe_model || $babe_model->password != $hashed_pass)
            return back()->with('status', 'Sorry email and password don\'t match');    
        
        // save user in session
        session([
          'user_email' => $babe_model->email,
          'user_id' => $babe_model->id,
          'gallery_name' => $babe_model->uuid 
        ]);
        return view('dashboard');
    }
}
