@extends('layouts.template')

@section('title')
Halaman Utama
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <p>Detail Absensi <span class="text-bold">{{Auth::user()->name}}</span></p>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <th>Check In</th>
                            <td>{{$attendance->check_in}}</td>
                        </tr>
                        <tr>
                            <th>Check Out</th>
                            <td>{{$attendance->check_out}}</td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>{{$attendance->keterangan}}</td>
                        </tr>
                        <tr>
                            <th>Catatan</th>
                            <td>{{$attendance->catatan}}</td>
                        </tr>
                        <tr>
                            <th>Image</th>
                            <td><img src="{{ asset('/storage/images/attendance/'.$attendance->photo) }}" width="200px"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
