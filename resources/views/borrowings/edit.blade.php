@extends('layouts.app-master')

@section('content')

<div class="container">
    <div class="jumbotron">
    <h1 class="display-6">Tambah</h1>
        <hr class="my-4">     
            <form action="{{ route('borrowings.update', $borrowing->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <strong>Nis</strong>
                    <select class="form-control" name="nis">
                        @foreach($member as $mbr)
                        <option disabled selected  >{{ $borrowing->nis }}</option>
                        <option value="{{$mbr->nis}}">{{$mbr->nis}}</option>
                        @endforeach
                    </select>            
                </div>
                <div class="form-group">
                    <strong>Nama Peminjam</strong>
                    <select class="form-control" name="nama_member">
                        @foreach($member as $mbr)
                        <option disabled selected hidden >{{ $borrowing->nama_member }}</option>
                        <option value="{{$mbr->nama_member}}">{{$mbr->nama_member}}</option>
                        @endforeach
                    </select>            
                </div>
                    <div class="form-group">
                        <strong>Rayon</strong>
                        <select class="form-control" name="rayon" >
                            <option disabled selected hidden>{{ $borrowing->rayon }}</option>
                            @foreach($rayon as $ryn)
                            <option value="{{ $ryn->rayon }}">{{ $ryn->rayon }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <strong>Rombel</strong>
                        <select class="form-control" name="rombel" id="rombel">
                            <option disabled selected hidden>{{ $borrowing->rombel }}</option>
                            @foreach($rombel as $r)
                            <option value="{{ $r->rombel }}">{{ $r->rombel }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <strong>Judul Buku</strong>
                        <select class="form-control" name="judul_book" id="rombel">
                            <option disabled selected hidden>{{ $borrowing->judul_book }}</option>
                            @foreach($books as $book)
                            <option value="{{ $book->judul_book }}">{{ $book->judul_book }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <strong>Tanggal kembali</strong>
                        <input class="form-control" type="date" name="tgl_kembali" value="{{ $borrowing->tgl_kembali }}"></input>
                    </div>
                    <input type="hidden" name="petugas" value="{{ auth()->user()->username }}"> 
                    <br>
                    <select class="form-control" name="status">
                        <strong>status</strong>
                        <option disabled selected>{{ $borrowing->status}}</option>
                        <option>Sudah Dikembalikan</option>
                    </select>
                <br>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a class="btn btn-danger" href="{{ route('members.index') }}">Back</a>


</form>


</div>


</div>


@endsection