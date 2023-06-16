@extends('layouts.dashboard')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
                        <form action="{{route('book.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="title">Judul Buku</label>
                                <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Buku" required>
                            </div>
                            <div class="form-group">
                                <label for="title">ISBN<i style="opacity:0.5;">(Opsional)&ensp;</i></label>
                                <input type="number" class="form-control" id="isbn" name="isbn" placeholder="ISBN Buku">
                            </div>
                            <div class="form-group">
                                <label for="title">Kategori</label>
                                <select name="category" id="category" class="form-select">
                                    <option disabled selected option>Pilih</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->category}}">{{$category->category}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Pengarang</label>
                                <input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Pengarang Buku" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Penerbit</label>
                                <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Penerbit Buku" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Tahun Terbit</label>
                                <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" placeholder="Tahun Terbit" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Stok Buku</label>
                                <input type="number" class="form-control" id="stok" name="stok" placeholder="Stok Buku" min="1" required>
                            </div>
                            <div class="form-group">
                                <label for="">Lokasi</label>
                                <select class="form-select" name="lokasi" id="">
                                    <option value="" disabled selected>Pilih</option>
                                    <option value="rak1">Rak 1</option>
                                    <option value="rak2">Rak 2</option>
                                    <option value="rak3">Rak 3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Cover Buku<i style="opacity:0.5;">(Opsional)&ensp;</i></label>
                                <input type="file" class="form-control" id="cover" name="cover">
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi<i style="opacity:0.5;">(Opsional)&ensp;</i></label>
                                <textarea class="form-control" name="deskripsi" id="" cols="20" rows="5"></textarea>
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
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Pengarang</th>
                    <th>Stok</th>
                    <th>Cover</th>
                    <th>Aksi</th>
                    <!-- <th>Penerbit</th>
                    <th>Tahun Terbit</th> -->
                </tr>
            </thead>
            @php 
            $no = 1;
            @endphp
            @foreach($books as $book)
            <tbody>
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$book->judul}}</td>
                    <td>{{$book->category}}</td>
                    <td>{{$book->pengarang}}</td>
                    <td>{{$book->stok}}</td>
                    <td><img class="rounded" src="{{asset('images/'.$book->cover)}}" alt="" width="80px" height="70px"></td>
                    <!-- <td>{{$book->penerbit}}</td>
                    <td>{{$book->tahun_terbit}}</td> -->
                    <td>
                        <form action="{{route('book.destroy',$book->id)}}" method="POST">
                            @csrf 
                            @method('DELETE')
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Aksi
                                </button>
                                <span class="dropdown-menu">
                                    <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUpdate{{$book->id}}">Edit</a>
                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Yakin hapus data {{$book->judul}}?')">Hapus</button>
                                </span>
                            </div>
                        </form>
                    </td>
                    <div class="modal fade" id="modalUpdate{{$book->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('book.update',$book->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label for="title">Judul Buku</label>
                                        <input type="text" class="form-control" id="judul" name="judul" value="{{$book->judul}}" placeholder="Judul Buku" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">ISBN<i style="opacity:0.5;">(Opsional)&ensp;</i></label>
                                        <input type="number" class="form-control" id="isbn" name="isbn" value="{{$book->isbn}}" placeholder="ISBN Buku" >
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Kategori</label>
                                        <select name="category" id="category" class="form-select">
                                            <option disabled selected option>Pilih</option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->category}}" {{ ($category->category == $book->category) ? 'selected' : ''}}>{{$category->category}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Pengarang</label>
                                        <input type="text" class="form-control" id="pengarang" name="pengarang" value="{{$book->pengarang}}" placeholder="Pengarang Buku" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Penerbit</label>
                                        <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{$book->penerbit}}" placeholder="Penerbit Buku" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Tahun Terbit</label>
                                        <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" value="{{$book->tahun_terbit}}" placeholder="Tahun Terbit" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Stok Buku</label>
                                        <input type="number" class="form-control" id="stok" name="stok" value="{{$book->stok}}" placeholder="Stok Buku" min="1" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Lokasi</label>
                                        <select class="form-select" name="lokasi" id="">
                                            <option value="" disabled selected>Pilih</option>
                                            <option value="rak1"{{ $book->lokasi == 'rak1' ? 'selected':'' }}>Rak 1</option>
                                            <option value="rak2"{{ $book->lokasi == 'rak2' ? 'selected':'' }}>Rak 2</option>
                                            <option value="rak3"{{ $book->lokasi == 'rak3' ? 'selected':'' }}>Rak 3</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Cover Buku<i style="opacity:0.5;">(Opsional)&ensp;</i></label>
                                        <input type="file" class="form-control" id="image" name="cover" value="{{$book->cover}}">
                                        <!-- <img src="{{asset('images/'.$book->cover)}}" alt="" height="70px" width="auto"> -->
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($book->cover))? url('images/'.$book->cover):url('upload/no_image.jpg') }}" alt="Card image cap">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Deskripsi<i style="opacity:0.5;">(Opsional)&ensp;</i></label>
                                        <textarea class="form-control" name="deskripsi" id="" cols="20" rows="5">{{ $book->deskripsi }}</textarea>
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

<script type="text/javascript">

    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });

</script>

@endsection