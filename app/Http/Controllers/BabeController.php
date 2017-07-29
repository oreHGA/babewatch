<?php

namespace App\Http\Controllers;
use App\Models\Babe;
use Illuminate\Http\Request;
use App\Models\EmailModel;

class BabeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('signin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('signup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $babe_model = new Babe([
            'username' => $request->username,
            'email' => $request->email,
            'password' => password_hash( $request->password , CRYPT_BLOWFISH),
            'uuid' => uniqid('user_'),  
        ]);
        $babe_model->save();
        
        session([
          'user_name' => $babe_model->username,  
          'user_email' => $babe_model->email,
          'user_id' => $babe_model->id,
          'gallery_name' => $babe_model->username . 'gallery',
        ]);

        $email_sender = new EmailModel();
        $email_sender->welcomeMail($babe_model->email);

        // TODO: doNT FORGET TO Check if user already exists
        return view('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Babe  $babe
     * @return \Illuminate\Http\Response
     */
    public function show(Babe $babe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Babe  $babe
     * @return \Illuminate\Http\Response
     */
    public function edit(Babe $babe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Babe  $babe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Babe $babe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Babe  $babe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Babe $babe)
    {
        //
    }
}
