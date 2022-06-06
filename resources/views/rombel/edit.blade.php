@extends('layouts.app-master')

@section('content')

<div class="container">
    <div class="jumbotron">
    <h1 class="display-6">Edit Data Rombel</h1>
        <hr class="my-4">     
            <form action="{{ route('rombel.update',$rombel->id) }}" method="POST">

                @csrf
                @method('PUT')
                
                    <div class="form-group">
                        <strong>Rombel :</strong>
                        <input type="text" class="form-control" id="rombel" name="rombel" placeholder="Rombel" value="{{$rombel->rombel}}" autocomplete="off">
                    </div>
<br>

<button type="submit" class="btn btn-primary">Simpan</button>
<a class="btn btn-danger" href="{{ route('rombel.index') }}">Back</a>


</form>


</div>


</div>


@endsection