<?php

namespace App\Http\Controllers;

use App\Babe;
use Illuminate\Http\Request;

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
