@extends('layouts.app-master')

@section('content')

<div class="container">
    <div class="jumbotron">
        @if(session('msg'))
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">

        {{session('msg')}}
        <!-- <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">&times;</span>
        </button> -->
        </div>
        @endif

        <h1 class="display-6">Data Peminjaman</h1>
        <hr class="my-4">
        <a href="{{ route('borrowings.create') }}" class="btn btn-primary mb-1">Pinjam</a>
    
    <table class="table">
        <thead class="thead-dark">
           <tr>
               <th scope="col">No</th>
               <th scope="col">NIS</th>
               <th scope="col">Nama</th>
               <th scope="col">Rayon</th>
               <th scope="col">Rombel</th>
               <th scope="col">Judul Buku</th>
               <th scope="col">Petugas</th>
               <th scope="col">Tanggal Pinjam</th>
               <th scope="col">Tanggal Kembali</th>
               <th scope="col">Status</th>
               <th width="150px"scope="col">Action</th>
           </tr>     
        </thead>
        <tbody>
            @foreach($borrowings as $borrowing)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $borrowing->nis }}</td>
                <td>{{ $borrowing->nama_member }}</td>
                <td>{{ $borrowing->rayon }}</td>
                <td>{{ $borrowing->rombel }}</td>
                <td>{{ $borrowing->judul_book }}</td>
                <td>{{ $borrowing->petugas }}</td>
                <td>{{ $borrowing->tgl_pinjam }}</td>
                <td>{{ $borrowing->tgl_kembali }}</td>
                <td>{{ $borrowing->status }}</td>
                <td>
                    <a href="{{ route('borrowings.edit', $borrowing->id) }}" class="btn btn-primary">Edit</a>
                </td>

            </tr>

            @endforeach
            
        </tbody>

    </table>

    </div>

</div>
@endsection