<?php

namespace App\Http\Controllers;

use App\Models\{Petugas,User};
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petugas = Petugas::all();
        return view('admin.petugas.index', compact('petugas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'no_telp' => 'required'
        ]);

        $p = Petugas::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'no_telp' => $request->no_telp,
        ]);

        User::create([
            'id_petugas' => $p->id,
            'name' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->username),
            'type' => 2
        ]);        

        toast('Berhasil tambah data','success');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function show(Petugas $petugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function edit(Petugas $petugas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required',
            'nama' => 'required',
            'no_telp' => 'required'
        ]);

        $p = Petugas::where('id',$id)->update([
            'username' => $request->username,
            'nama' => $request->nama,
            'no_telp' => $request->no_telp
        ]);

        User::where('id_petugas',$id)->update([
            'name' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make('12345'),
            'type' => 2
        ]);

        // dd($request);

        toast('Berhasil ubah data','success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Petugas::where('id',$id)->delete();
        User::where('id_petugas',$id)->delete();

        toast('Berhasil hapus data','info');
        return back();
    }
}
