@extends('layouts.template')

@section('title')
Report Absensi
@endsection

@section('content')

<!-- form -->
<!-- endform -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                @if(Request::get('keyword'))
                <div class="alert alert-secondary alert-block">
                    Hasil pencarian <b>{{ Request::get('keyword') }}</b>
                </div>
                @endif
                <table class="table table-hover ">
                    @foreach($user as $row)
                    <thead>
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>{{$row->name}}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Checkin</th>
                            <th>Checkout</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($tampil)
                        @foreach($attendance as $att)
                        <tr>
                            <td>{{$att->date}}</td>
                            <td>{{$att->check_in}}</td>
                            <td>{{$att->check_out}}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                    @endforeach

                </table>
                <br>
            </div>
        </div>
    </div>

</div>
@endsection
