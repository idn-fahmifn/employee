@extends('layouts.template')

@section('title')
Halaman Utama
@endsection

@section('content')
@if(Auth::user()->level == 'admin')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <p>hallo, <span class="text-bold">{{Auth::user()->name}}</span></p>
                </div>
            </div>
        </div>
    </div>
</div>
@elseif(Auth::user()->level == 'employee')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Hallo, <span class="text-bold">{{Auth::user()->name}}</span></h2>
                    @if(!$datadiri)
                    <span class="text-danger text-bold"> Data belum lengkap </span><br>
                    <span class="text-secondary"> Lengkapi data diri anda </span>
                    <form action="{{route('datadiri.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
                    <div class="form-group">
                        <label class="label-form">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" required value="{{old('tempat_lahir')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="label-form">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" required value="{{old('tanggal_lahir')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="label-form">Jenis Kelamin</label>
                        <select name="jenis_kelamin" required value="{{old('jenis_kelamin')}}" class="form-control">
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="label-form">Status Menikah</label>
                        <select required value="{{old('status_menikah')}}" name="status_menikah" class="form-control">
                            <option value="menikah">Menikah</option>
                            <option value="belum menikah">Belum Menikah</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="label-form">Alamat</label>
                        <textarea required value="{{old('alamat')}}" name="alamat" rows="3" class="form-control"></textarea>
                    </div>  
                    <div class="form-group">
                        <label class="label-form">Nomor Hp</label>
                        <input required value="{{old('no_hp')}}" type="number" name="no_hp" class="form-control">
                    </div>   
                    <div class="form-group">
                        <button class="btn btn-primary">Tambahkan</button>
                    </div> 

                </form>
                    @endif

                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <span>Riwayat Absensi </span>
                </div>
                <div class="card-body">
                    <table class="table table-hover mt-2">
                        <tr>
                            <th>Tanggal</th>
                            <th>Check-in</th>
                            <th>Check-out</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                        @foreach($attendance as $row)
                        <tr>
                            </td>
                            <td>{{$row->date}}</td>
                            <td>{{$row->check_in}}</td>
                            <td>
                                @if($row->check_out == null)
                                Belum Checkout
                                @else
                                {{$row->check_out}}
                                @endif
                            </td>
                            <td>
                                @if($row->keterangan == 'hadir')
                                <span class="badge badge-success">{{$row->keterangan}}</span>
                                @elseif($row->keterangan == 'izin')
                                <span class="badge badge-warning">{{$row->keterangan}}</span>
                                @elseif($row->keterangan == 'sakit')
                                <span class="badge badge-warning">{{$row->keterangan}}</span>
                                @else
                                <span class="badge badge-danger">{{$row->keterangan}}</span>
                                @endif
                            </td>
                            <td>
                                @if($row->check_out == null)
                                <form action="{{route('attendance.update', [$row->id])}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <a href="{{route('attendance.show', [$row->id])}}" class="btn btn-warning"><i
                                            class="fa fa-eye"></i></a>
                                    <button class="btn btn-danger" type="submit">Checkout</button>
                                </form>
                                @else
                                <a href="{{route('attendance.show', [$row->id])}}" class="btn btn-warning"><i
                                        class="fa fa-eye"></i></a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endsection
