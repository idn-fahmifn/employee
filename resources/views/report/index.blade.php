@extends('layouts.template')

@section('title')
Report Absensi
@endsection

@section('content')

<!-- form -->
<!-- endform -->
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <form method="get" action="{{ route('report.index') }}">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" id="keyword" name="keyword"
                                value="{{ Request::get('keyword') }}" placeholder="Telusuri...">
                            <div class="input-group-append">
                                @if(Request::get('keyword'))
                                <a href="/report" class="btn btn-default"><i class="fa fa-arrow-left"></i></a>
                                @else
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('report.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label-control">Nama Laporan</label>
                                <input type="text" class="form-control" name="nama_laporan" required="required">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label-control">Start Date</label>
                                <input type="date" class="form-control" name="start_date" required="required">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label-control">End Date</label>
                                <input type="date" class="form-control" name="end_date" required="required">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <button type="submit" class="col-span-2 btn btn-success"> <i class="fa fa-download"></i> Generate</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
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
                <table class="table table-hover ">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th>Nama Laporan</th>
                            <th>Tanggal</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($report as $row)
                        <tr>
                            <td>{{ $loop->iteration + ($report->perpage() * ($report->currentPage() -1)) }}
                            </td>
                            <td>{{ $row->nama_laporan }}</td>
                            <td>{{ $row->start_date }} - {{$row->end_date}}</td>
                            <td>
                                <form method="post" action="{{route('report.destroy', [$row->id])}}"
                                    onsubmit="return confirm('Hapus {{$row->nama_report}}?')">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <a href="{{route('report.show',[$row->id])}}" class="btn btn-primary"><i
                                            class="fa fa-print"></i></a>
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                {{ $report->appends(Request::all())->links() }}
            </div>
        </div>
    </div>

</div>
@endsection
