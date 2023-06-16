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
                    <form action="{{route('student.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="title">NIS</label>
                            <input type="number" class="form-control" id="nis" name="nis" placeholder="NIS Siswa" min="0" required>
                        </div>
                        <div class="form-group">
                            <label for="title">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Siswa" required>
                        </div>
                        <div class="form-group">
                            <label for="title">Rombel</label>
                            <select name="rombel" id="rombel" class="form-select">
                                <option disabled selected option>Pilih</option>
                                @foreach($rombels as $rombel)
                                <option value="{{$rombel->rombel}}">{{$rombel->rombel}}</option>  
                                @endforeach                              
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">No Telp</label>
                            <input type="number" class="form-control" id="no_telp" name="no_telp" placeholder="No Telp" min="0" required>
                        </div>                       
                        <div class="modal-footer">                    
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
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Rombel</th>
                    <th>No Telp</th>                    
                    <th>Aksi</th>                    
                </tr>
            </thead>
            @php 
            $no = 1;
            @endphp
            @foreach($students as $student)
            <tbody>
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$student->nis}}</td>
                    <td>{{$student->nama}}</td>
                    <td>{{$student->rombel}}</td>
                    <td>{{$student->no_telp}}</td>                                        
                    <td>
                        <form action="{{route('student.destroy',$student->id)}}" method="POST">
                            @csrf 
                            @method('DELETE')
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Aksi
                                </button>
                                <span class="dropdown-menu">
                                    <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUpdate{{$student->id}}">Edit</a>
                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Yakin Hapus data {{$student->nama}}?')">Hapus</button>
                                </span>
                            </div>
                        </form>
                    </td>
                    <div class="modal fade" id="modalUpdate{{$student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('student.update',$student->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label for="title">NIS</label>
                                        <input type="number" class="form-control" value="{{$student->nis}}" name="nis" placeholder="NIS Siswa" min="0" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Nama</label>
                                        <input type="text" class="form-control" value="{{$student->nama}}" name="nama" placeholder="Nama Siswa" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Rombel</label>
                                        <select name="rombel" id="rombel" class="form-select">
                                            <option disabled selected option>Pilih</option>
                                            @foreach($rombels as $rombel)
                                            <option value="{{$rombel->rombel}}" {{ ($rombel->rombel == $student->rombel)? 'selected' : ''}}>{{$rombel->rombel}}</option>   
                                            @endforeach                             
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">No Telp</label>
                                        <input type="number" class="form-control" value="{{$student->no_telp}}" name="no_telp" placeholder="No Telp" min="0" required>
                                    </div>    
                                    <div class="modal-footer">                    
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