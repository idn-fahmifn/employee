<?php

namespace App\Http\Controllers;

use App\Datadiri;
use App\User;
use Illuminate\Http\Request;
use Validator;

class DatadiriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $datadiri = Datadiri::paginate(10);
        return view('datadiri.index', compact('datadiri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('datadiri.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'status_menikah' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required|max:13',
        ]);
        Datadiri::create($input);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Datadiri  $datadiri
     * @return \Illuminate\Http\Response
     */
    public function show(Datadiri $datadiri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Datadiri  $datadiri
     * @return \Illuminate\Http\Response
     */
    public function edit(Datadiri $datadiri)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Datadiri  $datadiri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Datadiri $datadiri)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Datadiri  $datadiri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Datadiri $datadiri)
    {
        //
    }
}
