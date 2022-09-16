@extends('layouts.template')
@section('title')
Absen
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('attendance.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_users" value="{{Auth::user()->id}}">
                        <div class="form-group">
                            <label class="label-control">Take Photo</label>
                            <input type="file" class="form-control" required name="photo" required="required">
                        </div>
                        <div class="form-group">
                            <label class="label-control">Catatan</label>
                            <textarea name="catatan" id="" class="form-control" required rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label class="label-control">Keterangan</label>
                            <select name="keterangan" class="form-control" required>
                                <option value="">Pilih Keterangan</option>
                                <option value="hadir">Hadir</option>
                                <option value="tidak hadir">Tidak Hadir</option>
                                <option value="Sakit">Sakit</option>
                                <option value="Izin">Izin</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection