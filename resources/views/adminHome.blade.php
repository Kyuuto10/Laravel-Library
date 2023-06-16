@extends('layouts.dashboard')

@section('content')

<div class="row">
        <div class="col-md-3">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Buku</h5>
                            <span class="h3 font-weight-bold mb-0">{{ $buku }}</span>
                          
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                <i class="ni ni-books"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Siswa</h5>
                            <span class="h3 font-weight-bold mb-0">{{ $siswa }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                <i class="ni ni-single-02"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Transaksi</h5>
                            <span class="h3 font-weight-bold mb-0">{{ $pinjam }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                <i class="ni ni-ruler-pencil"></i>
                                
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Riwayat</h5>
                            <span class="h3 font-weight-bold mb-0">{{ $kembali }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-purple text-white rounded-circle shadow">
                                <i class="ni ni-support-16"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
