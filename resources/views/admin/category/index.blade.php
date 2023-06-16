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
                    <form action="{{route('category.store')}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="title">Kategori</label>
                            <input type="text" class="form-control" id="category" name="category" placeholder="Kategori Buku" required>
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
                    <th>Kategori</th>                    
                    <th>Aksi</th>             
                </tr>
            </thead>
            @php 
            $no = 1;
            @endphp
            @foreach($categories as $category)
            <tbody>
                <tr>
                    <td>{{$no++}}</td>                    
                    <td>{{$category->category}}</td>                                        
                    <td>
                        <form action="">
                            <a href="" class="btn btn-warning">Edit</a>
                        </form>
                    </td>                    
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>

@endsection