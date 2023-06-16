@extends('layouts.dashboard')
@section('content')



    <div class="mt-4">
        <div class="pull-right">
            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalCreate">Tambah</button>
        </div>

        <!-- Modal Create -->
        <div class="modal fade" id="modalCreate" tab-index="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('peminjaman.store')}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="title">NIS</label>
                            <select name="siswa_id" id="nis" class="form-select select">
                                <option disabled selected option>Pilih</option>
                                @foreach($students as $student)
                                <option value="{{$student->id}}">{{$student->nis}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group d-none" id="name">
                            <label for="">Nama</label>
                            <input type="text" id="nama" class="form-control" readonly>            
                        </div>

                        <div class="form-group">
                            <label for="title">Buku</label>
                            <select name="books_id" id="buku" class="form-select select">
                                <option disabled selected option>Pilih</option>
                                @foreach($books as $book)
                                <option value="{{$book->id}}">{{$book->judul}}</option>
                                @endforeach
                            </select>
                        </div>     
                        
                        <div class="form-group d-none" id="stok">
                            <label for="">Stok Buku</label>
                            <input type="number" id="stock" class="form-control" readonly>            
                        </div>

                        <div class="form-group">
                            <label for="">Keterangan<i style="opacity:0.5;">(Opsional)&ensp;</i></label>
                            <textarea class="form-control" name="ket" id="" cols="10" rows="3"></textarea>
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
                    <th>NIS</th>     
                    <th>Nama</th>           
                    <th>Buku</th>
                    <th>Tgl Pinjam</th>
                    <th>Tgl Kembali</th>
                    <th>Petugas</th>    
                    <th>Status</th>                
                    <th>Aksi</th>                    
                </tr>
            </thead>
            @foreach($borrows as $borrow)
            <tbody>
                <tr>
                    <td>@foreach($students as $student)
                            @if($student->id == $borrow->siswa_id)
                                {{ $student->nis }}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach($students as $student)
                            @if($student->id == $borrow->siswa_id)
                                {{ $student->nama }}
                            @endif
                        @endforeach
                    </td>
                    <td>@foreach($books as $book)
                            @if($book->id == $borrow->books_id)
                                {{ $book->judul }}
                            @endif
                        @endforeach
                    </td>
                    <td>{{ $borrow->tgl_pinjam }}</td>
                    <td>{{ $borrow->tgl_kembali }}</td>
                    <td>@foreach($users as $p)
                            @if($p->id == $borrow->user_id)
                                {{ $p->name }}
                            @endif
                        @endforeach
                    </td>          
                    <td>{{ $borrow->status }}</td>                            
                    <td>
                        <form action="{{route('peminjaman.destroy',$borrow->id)}}" method="POST">
                            @csrf 
                            @method('DELETE')
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Aksi
                                </button>
                                <span class="dropdown-menu">
                                    <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUpdate{{$borrow->id}}">Edit</a>
                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Yakin Hapus data {{$borrow->nis}}?')">Hapus</button>
                                </span>
                            </div>
                        </form>
                    </td>

                    <!-- Modal update -->
                    <div class="modal fade" id="modalUpdate{{$borrow->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('peminjaman.update',$borrow->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label for="title">NIS</label>
                                        <select name="siswa_id" id="nis" class="form-select">
                                            <option disabled selected option>Pilih</option>
                                            @foreach($students as $student)
                                            <option value="{{$student->nis}}" {{ ($student->id == $borrow->siswa_id)? 'selected' : '' }}>{{$student->nis}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- <div class="form-group" id="d-none">
                                        <label for="">Nama</label>
                                        <input type="text" id="nama" class="form-control" value="{{$borrow->nama}}" readonly>            
                                    </div> -->

                                    <div class="form-group">
                                        <label for="title">Buku</label>
                                        <select name="books_id" id="buku" class="form-select">
                                            <option disabled selected option>Pilih</option>
                                            @foreach($books as $book)
                                            <option value="{{$book->id}}" {{ ($book->id == $borrow->books_id)? 'selected' : '' }}>{{$book->judul}}</option>
                                            @endforeach
                                        </select>
                                    </div>  

                                    <div class="form-group">
                                        <label for="">Keterangan<i style="opacity:0.5;">(Opsional)&ensp;</i></label>
                                        <textarea class="form-control" name="ket" id="" cols="10" rows="3">{{$borrow->ket}}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Status</label><br>
                                        <input class="form-check-input" type="radio" name="status" value="pinjam" {{$borrow->status== 'pinjam' ? 'checked' : ''}}>
                                        <label class="form-check-label "for="inlineRadio1">Pinjam</label>
                                        <br>
                                        <input class="form-check-input" type="radio" name="status" value="kembali" {{$borrow->type == 'kembali' ? 'checked' : ''}}>
                                        <label class="form-check-label "for="inlineRadio1">Kembali</label>
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

    <script>

        $('.select').select2({
            dropdownParent: $('#modalCreate')
        });

        $('#nis').on('change', function(){
            var nis = $('#nis').val();
            $('#name').removeClass('d-none');
            $.ajax({
                url: "{{url('peminjaman/getData/')}}" + "/" + nis,
                type: "GET",
                dataType: "json",
                success: function(data){
                    console.log(data);
                    $('#nama').val(data['nama']);
                }
            });
        });

        $('#buku').on('change', function(){
            var id_book = $('#buku').val();
            $('#stok').removeClass('d-none');
            $.ajax({
                url: "{{ url('peminjaman/getBook/') }}" + "/" + id_book,
                type: "GET",
                dataType: "json",
                success: function(data){
                    console.log(data);
                    $('#stock').val(data['stok']);
                }
            });
        });

    </script>

@endsection