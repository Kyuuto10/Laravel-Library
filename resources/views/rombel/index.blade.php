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

        <h1 class="display-6">Data Rombel</h1>
        <hr class="my-4">
        <a href="{{ route('rombel.create') }}" class="btn btn-primary mb-1">Tambah Rombel</a>
    
    <table class="table">
        <thead class="thead-dark">
           <tr>
               <th scope="col">No</th>
               <th scope="col">Rombel</th>
               <th scope="col">Action</th>
           </tr>     
        </thead>
        <tbody>
            @foreach($rombel as $r)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $r->rombel}}</td>
                <td>

                <form action="{{ route('rombel.destroy', $r->id) }}" method="post">
                   
                   <a href="{{ route('rombel.edit', $r->id) }}" class="btn btn-primary">Edit</a>

                   @csrf
                   @method('DELETE')

                  <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Menghapus {{ $r->rombel}}?');">Hapus</button>
                </td>
            </tr>

            @endforeach
            
        </tbody>

    </table>

    </div>

</div>
@endsection