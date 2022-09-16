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
            <div class="col-md-6">
                <form method="get" action="{{ route('datadiri.index') }}">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" id="keyword" name="keyword"
                                value="{{ Request::get('keyword') }}" placeholder="Telusuri...">
                            <div class="input-group-append">
                                @if(Request::get('keyword'))
                                <a href="/datadiri" class="btn btn-default"><i class="fa fa-arrow-left"></i></a>
                                @else
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                                <a href="/datadiri/create" class="btn btn-success"><i class="fa fa-plus"></i></a>
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
                            <th>Username</th>
                            <th width="15%">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datadiri as $row)
                        <tr>
                            <td>{{ $loop->iteration + ($datadiri->perpage() * ($datadiri->currentPage() -1)) }}
                            </td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->Karyawanname }}</td>
                            <td>
                                <form method="post" action="{{route('Karyawan.destroy', [$row->id])}}"
                                    onsubmit="return confirm('Hapus {{$row->nama_Karyawan}}?')">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <a href="{{route('karyawan.edit',[$row->id])}}" class="btn btn-primary"><i
                                            class="fa fa-edit"></i></a>
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                {{ $datadiri->appends(Request::all())->links() }}
            </div>
        </div>
    </div>

</div>
@endsection
