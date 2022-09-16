@extends('layouts.template')

@section('title')
Database User
@endsection

@section('content')

<!-- form -->
<!-- endform -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <span class="text-primary text-bold"> Data Akun  </span>
                <table class="table table-hover">
                    <tr>
                        <th>Nama Lengkap</th>
                        <td>{{ $users->name }}</td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td>{{ $users->username }}</td>
                    </tr>
                    <tr>
                        <th>Level</th>
                        <td>{{ $users->level }}</td>
                    </tr>
                </table>
                <br>

                @if($datadiri)
                <span class="text-primary text-bold"> Data Diri Karyawan  </span>

                @foreach($datadiri as $row)
                <table class="table table-hover">
                    <tr>
                        <th>Tempat Lahir</th>
                        <td>{{ $row->tempat_lahir }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td>{{ $row->tanggal_lahir }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>{{ $row->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <th>Status Menikah</th>
                        <td>{{ $row->status_menikah }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $row->alamat }}</td>
                    </tr>
                </table>
                @endforeach
                @else
                <span class="text-danger text-bold"> Data belum lengkap </span><br>
                <span class="text-primary"> Lengkapi data dibawah :  </span><hr>

                <form action="{{route('datadiri.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="id_user" value="{{$users->id}}">
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
    </div>

</div>
@endsection
