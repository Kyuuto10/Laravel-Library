@extends('layouts.dashboard')
@section('content')

<table class="table">
    <thead>
    <tr>
        <th>Tgl Kembali</th>
        <th>Buku</th>
        <th>Denda</th>
        <th>NIS</th>
        <th>Petugas</th>
    </tr>
    </thead>
    @foreach($kembali as $k)
    <tbody>
        <tr>
            <td>{{ $k->tgl_kembali }}</td>
            <td>{{ $k->judul }}</td>
            <td>Rp {{ number_format($k->denda,'0','.','.') }}</td>
            <td>{{ $k->nis }}</td>
            <td>{{ $k->name }}</td>
        </tr>
    </tbody>
    @endforeach
</table>


@endsection