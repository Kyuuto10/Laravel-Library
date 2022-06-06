@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <h1>Perpustakaan</h1>
        <p class="lead">Selamat Datang di Perpustakaan</p>
        @endauth

        @guest
        <h1>Welcome</h1>
        <p class="lead">Silahkan Login terlebih dahulu untuk masuk ke perpustakaan.</p>
        @endguest
    </div>
@endsection