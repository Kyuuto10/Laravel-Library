@extends('layouts.app-master')

@section('content')

<div class="container">
    <div class="jumbotron">
    <h1 class="display-6">Tambah Data Buku</h1>
        <hr class="my-3">     
            <form action="{{ route('books.store') }}" method="POST">
                @csrf

                    <div class="form-group">
                        <strong>Judul Buku :</strong>
                        <input type="text" class="form-control" id="judul_buku" name="judul_buku" placeholder="Judul Buku"autocomplete="off">
                    </div>

                    <div class="form-group">
                        <strong>Pengarang :</strong>
                        <input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Pengarang" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <strong>Penerbit :</strong>
                        <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Penerbit" autocomplete="off">
                    </div>
                        <br><br>

                    <button type="submit" class="btn btn-primary">Simpan</button>

                    <a class="btn btn-danger" href="{{ route('books.index') }}">Back</a>

            </form>

        </div>

    </div>

@endsection