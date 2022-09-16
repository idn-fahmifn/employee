<?php

namespace App\Http\Controllers;

use App\Datakantor;
use Illuminate\Http\Request;

class DatakantorController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Datakantor  $datakantor
     * @return \Illuminate\Http\Response
     */
    public function show(Datakantor $datakantor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Datakantor  $datakantor
     * @return \Illuminate\Http\Response
     */
    public function edit(Datakantor $datakantor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Datakantor  $datakantor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Datakantor $datakantor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Datakantor  $datakantor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Datakantor $datakantor)
    {
        //
    }
}
