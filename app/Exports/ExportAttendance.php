<?php

namespace App\Exports;

use App\Attendance;
use App\User;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class ExportAttendance implements FromView,ShouldAutoSize
{
    public function view(): View
    {
        $attendance = Attendance::all();
        $user = User::all();
        return view('attendance.cetak_excel', compact('attendance', 'user'));
    }
}