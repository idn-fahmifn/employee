<?php

namespace App\Http\Controllers;

use App\Jabatan;
use Illuminate\Http\Request;
use Validator;

class JabatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $jabatan = Jabatan::when($request->keyword, function($query) use ($request){
            $query->where('nama_jabatan', 'LIKE', "%{$request->keyword}%");
        })->paginate(10);
        return view('jabatan.index', compact('jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jabatan.create');   
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
        $validator = Validator::make($input,[
            'nama_jabatan' => 'required|max:20',
        ]);
        if($validator->fails())
        {
            return redirect()->route('jabatan.index')->withErrors($validator)->withInput();
        }
        Jabatan::create($input);
        return redirect()->route('jabatan.index')->with('success','Jabatan Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show(Jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        return view('jabatan.edit', compact('jabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $input = $request->all();
        $validator = Validator::make($input,[
            'nama_jabatan' => 'required|max:20',
        ]);
        if($validator->fails())
        {
            return redirect()->route('jabatan.index')->withErrors($validator)->withInput();
        }
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->update($input);
        return redirect()->route('jabatan.index')->with('success','Jabatan Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jabatan $jabatan)
    {
        //
    }
}
