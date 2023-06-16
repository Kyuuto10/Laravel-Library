<?php

namespace App\Http\Controllers;

use App\Models\{Siswa,Book,Peminjaman,Pengembalian};
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $view = Peminjaman::where('siswa_id',auth()->user()->id_siswa)
                            ->join('users','users.id','=','peminjaman.user_id')
                            ->join('books','books.id','=','peminjaman.books_id')
                            ->get();                            
        return view('home',compact('view'));
    }

    public function adminHome()
    {
        $buku = Book::count();
        $siswa = Siswa::count();
        $pinjam = Peminjaman::count();
        $kembali = Pengembalian::count();
        $transaksi_pinjam = Peminjaman::groupBy('status')->select('status',DB::raw('count(*) as total'))->get();
        $jenis_kelamin =  Siswa::groupBy('jk')->select('jk',DB::raw('count(*) as total'))->get();
        
        return view('adminHome', compact('buku','siswa','kembali','pinjam','jenis_kelamin','transaksi_pinjam'));
    }

    public function petugasHome()
    {
        return view('petugasHome');
    }
}
