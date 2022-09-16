@extends('layouts.template')

@section('title')
Database Jabatan
@endsection

@section('content')

<!-- form -->
<!-- endform -->
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <form method="get" action="{{ route('jabatan.index') }}">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" id="keyword" name="keyword"
                                value="{{ Request::get('keyword') }}" placeholder="Telusuri...">
                            <div class="input-group-append">
                                @if(Request::get('keyword'))
                                <a href="/jabatan" class="btn btn-default"><i class="fa fa-arrow-left"></i></a>
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
            <div class="col-md-6">
                <form method="post" action="{{route('jabatan.store')}}">
                    @csrf
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" name="nama_jabatan" placeholder="Tambah jabatan">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-plus"></i>
                                </button>
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
                @include('sweetalert::alert')
                @if(Request::get('keyword'))
                <div class="alert alert-secondary alert-block">
                    Hasil pencarian <b>{{ Request::get('keyword') }}</b>
                </div>
                @endif
                <table class="table table-hover ">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th>Nama jabatan</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jabatan as $row)
                        <tr>
                            <td>{{ $loop->iteration + ($jabatan->perpage() * ($jabatan->currentPage() -1)) }}
                            </td>
                            <td>{{ $row->nama_jabatan }}</td>
                            <td>
                                <form method="post" action="{{route('jabatan.destroy', [$row->id])}}"
                                    onsubmit="return confirm('Hapus {{$row->nama_jabatan}}?')">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <a href="{{route('jabatan.edit',[$row->id])}}" class="btn btn-primary"><i
                                            class="fa fa-edit"></i></a>
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                {{ $jabatan->appends(Request::all())->links() }}
            </div>
        </div>
    </div>

</div>
@endsection
