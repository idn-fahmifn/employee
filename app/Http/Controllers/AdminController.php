<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
use App\Datadiri;
use App\User;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function adminAttendance(){
        $user = User::paginate(10);
        return view ('admin.attendance', compact('user'));
    }
    public function show($id){
        $user = User::paginate(10);
        $att = Attendance::all();
        return view ('admin.attendance', compact('user', 'att'));
    }

}
