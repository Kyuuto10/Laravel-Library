@extends('layouts.app-master')

@section('content')

<div class="container">
    <div class="jumbotron">
    <h1 class="display-6">Tambah Data Siswa</h1>
        <hr class="my-4">     
            <form action="{{ route('members.update',$member->id) }}" method="POST">
                @csrf
                
                    <div class="form-group">
                        <strong>NIS :</strong>
                        <input type="number" class="form-control" id="rombel" name="nis" placeholder="NIS" value="{{route ($member->nis) }}" autocomplete="off" min="0">
                    </div>
                    <div class="form-group">
                        <strong>Nama :</strong>
                        <input type="text" class="form-control" id="rombel" name="nama_member" placeholder="Nama" value="{{route ($member->nama_member) }}" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <strong>Jenis Kelamin</strong>
                        <select class="form-control" name="jk" id="jk">
                            <option value="disable">--Pilih--</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <strong>Rayon</strong>
                        <select class="form-control" name="rayon" id="jk">
                            <option value="disable">--Pilih--</option>
                            @foreach($rayon as $ryn)
                            <option value="{{$ryn->rayon}}">{{$ryn->rayon}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <strong>Rombel</strong>
                        <select class="form-control" name="rombel" id="rombel">
                            <option value="disable">--Pilih--</option>
                            @foreach($rombel as $r)
                            <option value="{{$r->rombel}}">{{$r->rombel}}</option>
                            @endforeach
                        </select>
                    </div>
                    
<br>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a class="btn btn-danger" href="{{ route('members.index') }}">Back</a>


</form>


</div>


</div>


@endsection