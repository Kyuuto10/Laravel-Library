@extends('layouts.dashboard')
@section('content')

    <div class="mt-4">
        <div class="pull-right">
            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalCreate">Tambah</button>
        </div>

        <!-- Modal Create -->
        <div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('petugas.store')}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="title">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Petugas" required>
                        </div>
                        <div class="form-group">
                            <label for="title">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <label for="title">No Telp</label>
                            <input type="number" class="form-control" id="no_telp" name="no_telp" placeholder="No Telp" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                    </form>
                </div>
                </div>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>                    
                    <th>Nama</th>   
                    <th>Username</th> 
                    <th>No Telp</th>                
                    <th>Aksi</th>             
                </tr>
            </thead>
            @php 
            $no = 1;
            @endphp
            @foreach($petugas as $p)
            <tbody>
                <tr>
                    <td>{{$no++}}</td>                    
                    <td>{{$p->nama}}</td>
                    <td>{{$p->username}}</td>
                    <td>{{$p->no_telp}}</td>
                    <td>
                        <form action="{{route('petugas.destroy',$p->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUpdate{{$p->id}}">Edit</a>
                            <button class="btn btn-danger" onclick="return confirm('Yakin hapus data {{$p->nama}}?')">Hapus</button>
                        </form>
                    </td>

            <!-- Modal Create -->
            <div class="modal fade" id="modalUpdate{{$p->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('petugas.update',$p->id)}}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="title">Nama</label>
                                <input type="text" class="form-control" value="{{$p->nama}}" name="nama" placeholder="Nama Petugas" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Username</label>
                                <input type="text" class="form-control" value="{{$p->username}}" name="username" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <label for="title">No Telp</label>
                                <input type="number" class="form-control" value="{{$p->no_telp}}" name="no_telp" placeholder="No Telp" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>

                        </form>
                    </div>
                    </div>
                </div>
            </div>

                </tr>
            </tbody>
            @endforeach
        </table>
    </div>

@endsection