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

        if(!$babe_model || password_verify($request->password, $babe_model->password))
            return back()->with('status', 'Sorry email and password don\'t match');    
        
        // save user in session
        session([
          'user_name' => $babe_model->username,
          'user_email' => $babe_model->email,
          'user_id' => $babe_model->id,
          'gallery_name' => $babe_model->uuid 
        ]);
        return redirect()->route('dashboard');
    }

    public function signout(Request $r){
        // dd(\session()->all());
        $r->session()->forget([
            'user_name',
            'user_email',
            'user_id',
            'gallery_name'
        ]);
        return redirect()->route('welcome');
    }
}
