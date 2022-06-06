<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Book;
use App\Models\Member;
use App\Models\Rombel;
use App\Models\Rayon;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $borrowings = Borrowing::latest()->paginate(5);

        return view('borrowings.index',compact('borrowings'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::all();
        $member = Member::all();
        $rayon = Rayon::all();
        $rombel = Rombel::all();
        $users = User::all();
        return view('borrowings.create',compact('books','member','rayon','rombel','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Borrowing::create([
            'nama_member' => $request->nama_member,
            'judul_book' => $request->judul_book,
            'nis' => $request->nis,
            'rombel' => $request->rombel,
            'rayon' => $request->rayon,
            'petugas' => $request->petugas,
            'tgl_pinjam' => Carbon::now(),
            'tgl_kembali' => $request->tgl_kembali,
            'status' => $request->status
        ]);
        
        return redirect()->route('borrowings.index')
                        ->with('success','Berhasil Menyimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $borrowing = Borrowing::find($id);
        $books = Book::all();
        $member = Member::all();
        $rayon = Rayon::all();
        $rombel = Rombel::all();
        $users = User::all();
        return view('borrowings.edit',compact('borrowing','books','member','rayon','rombel','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_member' => $request->nama_member,
            'judul_book' => $request->judul_book,
            'nis' => $request->nis,
            'rombel' => $request->rombel,
            'rayon' => $request->rayon,
            'petugas' => $request->petugas,
            'tgl_pinjam' => Carbon::now(),
            'tgl_kembali' => $request->tgl_kembali,
            'status' => $request->status
        ]);
        $borrowing->update($request->all());
        
        return redirect()->route('borrowings.index')
                        ->with('success','Berhasil Menyimpan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
