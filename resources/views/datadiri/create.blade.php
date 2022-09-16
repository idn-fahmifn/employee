@extends('layouts.template')
@section('title')
Tambah Data Diri
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection