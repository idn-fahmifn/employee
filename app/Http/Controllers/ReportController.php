<?php

namespace App\Http\Controllers;

use App\Report;
use App\Attendance;
use App\User;
use Illuminate\Http\Request;


class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $report = Report::paginate(20);
        return view('report.index', compact('report'));
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
        $input = $request->all();
        Report::create($input);
        return redirect('/report')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $report = Report::find($id);
        $user = User::all();
        $attendance = Attendance::where('id_users', $id)->get()->all();
        $start_date = $report['start_date'];
        $end_date = $report['end_date'];
        $tampil = Attendance::whereBetween('date',[$start_date,$end_date])->orderBy('date','DESC')->paginate(20);
        return view('report.print', compact('report', 'attendance', 'tampil', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Report::findOrFail($id);
        $data->delete();
        return redirect('report');
    }
}
