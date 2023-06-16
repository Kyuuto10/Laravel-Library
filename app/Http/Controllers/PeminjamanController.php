<?php

namespace App\Http\Controllers;

use App\Models\{Peminjaman,Siswa,Book,User,Pengembalian};
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\TryCatch;
use DateTime;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $borrows = Peminjaman::with('siswa','buku','user')->orderBy('created_at','desc')->paginate(6);        
        $students = Siswa::all();
        $books = Book::all();
        $users = User::all();
        return view('admin.peminjaman.index', compact('borrows','students','books','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'books_id' => 'required',
            'siswa_id' => 'required',              
        ]);

        $siswa = Siswa::where('id',$request->siswa_id)->first();

        if (Peminjaman::where('siswa_id',$siswa->id)->exists() == true && Peminjaman::where('status','pinjam')->exists() == true) {
            toast('Masih ada buku yang dipinjam','info');
            return back();
        }

        $buku = Book::where('id',$request->books_id)->first();
        if($buku->stok > 0){
        $pinjam = Peminjaman::create([
            'siswa_id' => $request->siswa_id,
            'kode_transaksi' => Str::random(10),
            'books_id' => $request->books_id,
            'tgl_pinjam' => Carbon::now(),
            'tgl_kembali' => Carbon::now()->addDays(7),
            'status' => 'pinjam',
            'ket' => $request->ket,
            'user_id' => auth()->user()->id
        ]);        
        
        $buku->update([
            'stok' => $buku->stok - 1
        ]);

        toast('Berhasil pinjam buku','info');
        return back();
    }else{
        toast('Stok buku kurang','info');
        return back();
    }
        
        // if($pinjam){
        //     toast('Berhasil simpan data','success');
        //     return back();
        // }else{
        //     toast('Gagal simpan data','error');
        //     return back();
        // }
    }

    public function getData($nis)
    {
        $students = Siswa::where('id','=',$nis)->first();    
        $data = [
            'nama' => $students->nama,            
        ];

        return response()->json($data);
    }

    public function getBook($id_book)
    {
        $books = Book::where('id','=',$id_book)->first();
        $data = [            
            'stok' => $books->stok
        ];

        return response()->json($data);
    }    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);   
        $request->validate([
            'status' => 'required',                   
        ]);
            
        $siswa = Siswa::where('id',$request->siswa_id)->first();
        $borrow = Peminjaman::where('id',$id)->first();
        $borrow->update([                               
            'siswa_id' => $siswa->id ?? $borrow->siswa_id,
            'kode_transaksi' => $borrow->kode_transaksi,
            'books_id' => $request->books_id ?? $borrow->books_id,
            'tgl_pinjam' => $request->tgl_pinjam ?? $borrow->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali ?? $borrow->tgl_kembali,
            'status' => $request->status ?? $borrow->status,
            'ket' => $request->ket ?? $borrow->ket,
            'user_id' => auth()->user()->id,
            'date_modified' => Carbon::now()
        ]);

        $buku = Book::where('id',$borrow->books_id)->first();
        if($borrow->status == 'kembali'){
            Peminjaman::where('status','=','kembali')->delete();            
            $pinjam = new DateTime($borrow->tgl_kembali);
            $n = date_create(date('Y-m-d'));
            if($pinjam >= $n){
                $denda = 0 * 1000;
            }else{
                $terlambat = date_diff($pinjam,$n);
                $hari = $terlambat->format('%a');
                $denda = $hari * 1000;
            }
            Pengembalian::create([
                'tgl_kembali' => $borrow->date_modified,
                'id_book' => $borrow->books_id,
                'denda' => $denda,
                'id_siswa' => $borrow->siswa_id,
                'id_user' => $borrow->user_id
            ]);

            $buku->update(['stok'=>$buku->stok + 1]);
            toast('Buku telah dikembalikan','info');
            return back();
        }else{
            toast('Data telah diubah','info');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $borrow = Peminjaman::where('id',$id)->delete();

        toast('Berhasil hapus data','info');
        return back();
    }
}
