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

        <h1 class="display-6">Data Siswa</h1>
        
        <a href="{{ route('members.create') }}" class="btn btn-primary mb-1">Tambah Siswa</a>
    
    <table class="table">
        <thead class="thead-dark">
           <tr>
               <th scope="col">No</th>
               <th scope="col">NIS</th>
               <th scope="col">Nama</th>
               <th scope="col">JK</th>
               <th scope="col">Rayon</th>
               <th scope="col">Rombel</th>
               <th scope="col">Action</th>
           </tr>     
        </thead>
        <tbody>
            @foreach($members as $member)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $member->nis }}</td>
                <td>{{ $member->nama_member }}</td>
                <td>{{ $member->jk }}</td>
                <td>{{ $member->rayon }}</td>
                <td>{{ $member->rombel }}</td>
                <td>
                    <form action="{{ route('members.destroy', $member->id) }}" method="post">

                    <a href="{{ route('members.edit', $member->id) }}" class="btn btn-primary">Edit</a>

                    @csrf
                    @method('DELETE')

                   <a class="btn btn-danger" onclick="return confirm('Yakin Menghapus {{ $member->nama_member}}?');">Delete</a>
                   <!-- <button type="submit" class="btn btn-danger" onclick="return confirm('yakin mau hapus')"><i class="fas fa-trash"></i></button> -->
                    </form>
                </td>
            </tr>

            @endforeach
            
        </tbody>

    </table>

    </div>

</div>
@endsection
