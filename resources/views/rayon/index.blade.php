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

        <h1 class="display-6">Data Rayon</h1>
        <hr class="my-4">
        <a href="{{ route('rayon.create') }}" class="btn btn-primary mb-1">Tambah Rayon</a>
    
    <table class="table">
        <thead class="thead-dark">
           <tr>
               <th scope="col">No</th>
               <th scope="col">Rayon</th>
               <th scope="col">Pembimbing Rayon</th>
               <th scope="col">Action</th>
           </tr>     
        </thead>
        <tbody>
            @foreach($rayon as $ryn)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $ryn->rayon}}</td>
                <td>{{ $ryn->pem_rayon}}</td>
                <td>

                <form action="{{ route('rayon.destroy', $ryn->id) }}" method="post">
                   
                    <a href="{{ route('rayon.edit', $ryn->id) }}" class="btn btn-primary">Edit</a>

                    @csrf
                    @method('DELETE')

                   <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Menghapus Rayon {{ $ryn->rayon}}?');">Hapus</button>
                </form>
                </td>
            </tr>

            @endforeach
            
        </tbody>

    </table>

    </div>

</div>
@endsection