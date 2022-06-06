@extends('layouts.app-master')

@section('content')

<div class="container">
    <div class="jumbotron">
    <h1 class="display-6">Edit Data Rayon</h1>
        <hr class="my-4">     
            <form action="{{ route('rayon.update',$rayon->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                    <div class="form-group">
                        <strong>Rayon :</strong>
                        <input type="text" class="form-control" id="rayon" name="rayon" placeholder="Rayon" value="{{ $rayon->rayon }}" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <strong>Pembimbing Rayon :</strong>
                        <input type="text" class="form-control" id="pem_rayon" name="pem_rayon" placeholder="Pembimbing Rayon" value="{{ $rayon->pem_rayon }}" autocomplete="off">
                    </div>

<br>

<button type="submit" class="btn btn-primary">Simpan</button>
<a class="btn btn-danger" href="{{ route('rayon.index') }}">Back</a>


</form>


</div>


</div>


@endsection