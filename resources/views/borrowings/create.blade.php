@extends('layouts.app-master')

@section('content')

<div class="container">
    <div class="jumbotron">
    <h1 class="display-6">Tambah</h1>
        <hr class="my-4">     
            <form action="{{ route('borrowings.store') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <strong>Nis</strong>
                    <select class="form-control" name="nis">
                        @foreach($member as $mbr)
                        <option disabled selected hidden >--Pilih NIS--</option>
                        <option value="{{$mbr->nis}}">{{$mbr->nis}}</option>
                        @endforeach
                    </select>            
                </div>
                <div class="form-group">
                    <strong>Nama Peminjam</strong>
                    <select class="form-control" name="nama_member">
                        @foreach($member as $mbr)
                        <option disabled selected hidden >--Pilih Peminjam--</option>
                        <option value="{{$mbr->nama_member}}">{{$mbr->nama_member}}</option>
                        @endforeach
                    </select>            
                </div>
                    <div class="form-group">
                        <strong>Rayon</strong>
                        <select class="form-control" name="rayon" >
                            <option disabled selected hidden>--Pilih--</option>
                            @foreach($rayon as $ryn)
                            <option value="{{ $ryn->rayon }}">{{ $ryn->rayon }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <strong>Rombel</strong>
                        <select class="form-control" name="rombel" id="rombel">
                            <option disabled selected hidden>--Pilih--</option>
                            @foreach($rombel as $r)
                            <option value="{{ $r->rombel }}">{{ $r->rombel }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <strong>Judul Buku</strong>
                        <select class="form-control" name="judul_book" id="rombel">
                            <option disabled selected hidden>--Pilih--</option>
                            @foreach($books as $book)
                            <option value="{{ $book->judul_book }}">{{ $book->judul_book }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <strong>Tanggal kembali</strong>
                        <input class="form-control" type="date" name="tgl_kembali"></input>
                    </div>
                    <input type="hidden" name="petugas" value="{{ auth()->user()->username }}"> 

                    <input type="hidden" name="status" value="Belum Dikembalikan"></input>
                <br>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a class="btn btn-danger" href="{{ route('borrowings.index') }}">Back</a>


</form>


</div>


</div>


@endsection