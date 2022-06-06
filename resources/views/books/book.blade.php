@extends('layouts.app-master')

@section('content')

<div class="container">
    <div class="jumbotron">
        @if(session('msg'))
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            {{session('msg')}}
            <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button> -->
    </div>
        @endif
    <h1 class="display-6">Data Buku</h1>
    <hr class="my-4">     
        <a href="{{route ('books.create')}}" class="btn btn-primary mb-1">Tambah Buku</a>       
    <table class="table">
        <thead class="thead-dark">
    <tr>
        <th scope="col">No</th>
        <th scope="col">Judul Buku</th>
        <th scope="col">Pengarang</th>
        <th scope="col">Penerbit</th>
        <th scope="col">Action</th>
    </tr>
</thead>
@foreach ($books as $book)
<tbody>

    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $book->judul_book }}</td>
        <td>{{ $book->pengarang }}</td>
        <td>{{ $book->penerbit }}</td>
        <td>
        <form action="{{ route('books.destroy' ,$book->id_book) }}" method="POST">

            <a href="{{ route('books.edit', $book->id_book) }}" class="btn btn-primary">Edit</a>

            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Menghapus Buku {{ $book->judul_book }}?');">Hapus</button>
        </form>
        </td>
</tr>


</tbody>
@endforeach

</table>

</div>

</div>

@endsection