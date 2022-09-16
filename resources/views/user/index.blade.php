@extends('layouts.template')

@section('title')
Database User
@endsection

@section('content')

<!-- form -->
<!-- endform -->
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <form method="get" action="{{ route('user.index') }}">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" id="keyword" name="keyword"
                                value="{{ Request::get('keyword') }}" placeholder="Telusuri...">
                            <div class="input-group-append">
                                @if(Request::get('keyword'))
                                <a href="/user" class="btn btn-default"><i class="fa fa-arrow-left"></i></a>
                                @else
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                                <a href="/user/create" class="btn btn-success"><i class="fa fa-plus"></i></a>
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
                            <th>Nama user</th>
                            <th>Username</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $row)
                        <tr>
                            <td>{{ $loop->iteration + ($users->perpage() * ($users->currentPage() -1)) }}
                            </td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->username }}</td>
                            <td>
                                <form method="post" action="{{route('user.destroy', [$row->id])}}"
                                    onsubmit="return confirm('Hapus {{$row->nama_user}}?')">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <a href="{{route('user.edit',[$row->id])}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('user.show',[$row->id])}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>        
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                {{ $users->appends(Request::all())->links() }}
            </div>
        </div>
    </div>

</div>
@endsection
