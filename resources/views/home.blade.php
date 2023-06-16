@extends('layouts.dashboard')

@section('content')


        <table class="table"> 
            <thead>
                <tr>                            
                    <th>Petugas</th>
                    <th>Kode Transaksi</th>
                    <th>Tgl Pinjam</th>
                    <th>Tgl Kembali</th>
                    <th>Buku</th>
                    <th>Status</th>                                               
                </tr>
            </thead>
            <tbody>
                @php 
                $i = 1;
                @endphp
                @forelse($view as $v)
                <tr>
                    <td>{{$v->name}}</td>
                    <td>{{$v->kode_transaksi}}</td>
                    <td>{{$v->tgl_pinjam}}</td>
                    <td>{{$v->tgl_kembali}}</td>
                    <td>{{$v->judul}}</td>
                    <td>{{$v->status}}</td>                                                                                 
                </tr>

                @empty
                <tr>
                    <td colspan="6" style="text-align:center;"><span>Belum ada data!</span></td>
                </tr>
                

                @endforelse
            </tbody>
        </table>
                  
@endsection
