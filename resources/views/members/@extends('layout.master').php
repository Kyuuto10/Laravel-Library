@extends('layout.master')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add new</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('borrowings.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <br>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Ada beberapa masalah dengan input Anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        
    <form action="{{ route('borrowings.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                    <strong>Nis</strong>
                    <select class="form-control" name="nis_peminjam">
                        @foreach($students as $student)
                        <option disabled selected hidden >--Pilih NIS--</option>
                        <option value="{{$student->nis}}">{{$student->nis}}</option>
                        @endforeach
                    </select>            
                </div>
                <div class="form-group">
                    <strong>Nama Peminjam</strong>
                    <select class="form-control" name="nama_peminjam">
                        @foreach($students as $student)
                        <option disabled selected hidden >--Pilih Peminjam--</option>
                        <option value="{{$student->nama}}">{{$student->nama}}</option>
                        @endforeach
                    </select>            
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Judul buku</strong>
                    <select class="form-control" name="judul_buku">
                        @foreach($books as $book)
                        <option disabled selected hidden >--Pilih Buku--</option>
                        <option value="{{$book->judul}}">{{$book->judul}}</option>
                        @endforeach
                    </select>            
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tanggal Kembali</strong>
                    <input type="date" name="tgl_kembali" class="form-control" placeholder="Tanggal Kembali">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Keterangan</strong>
                    <input type="radio" name="ket" value="Kembali"> Kembali
                    <input type="radio" name="ket" value="Belum Kembali"> Belum Kembali
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection