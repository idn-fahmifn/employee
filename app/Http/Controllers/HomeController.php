<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
use App\User;
use App\Datadiri;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $attendance = Attendance::where('id_users', auth()->user()->id)->get()->all();
        $datadiri = Datadiri::where('id_user', auth()->user()->id)->get()->all();
        $users = User::all();
        return view('home', compact('attendance', 'datadiri', 'users'));
    }
}
