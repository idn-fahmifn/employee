@extends('layouts.template')

@section('title')
Database Karyawan
@endsection

@section('content')

<!-- form -->
<!-- endform -->
<div class="row">
    <div class="col-md-12">
        <div class="row">
            
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                @if(Request::get('keyword'))
                <div class="alert alert-secondary alert-block">
                    Hasil pencarian <b>{{ Request::get('keyword') }}</b>
                </div>
                @endif


                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th>Nama Karyawan</th>
                            <th>Tanggal</th>
                            <th width="15%">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($attendance as $row)
                        <tr>
                            <td>{{ $loop->iteration + ($attendance->perpage() * ($attendance->currentPage() -1)) }}
                            </td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->username }}</td>
                            <td>
                                <a href="#" class="btn btn-success"> <i class="fa fa-list"></i> </a>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                <br>
                {{ $attendance->appends(Request::all())->links() }}
            </div>
        </div>
    </div>

</div>
@endsection
