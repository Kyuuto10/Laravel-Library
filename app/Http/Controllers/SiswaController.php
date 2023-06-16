<?php

namespace App\Http\Controllers;

use App\Models\{Siswa,Rombel,User};
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Siswa::all();
        $rombels = Rombel::all();
        return view('admin.siswa.index', compact('students','rombels'));
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
            'nis' => 'required',
            'nama' => 'required',
            'rombel' => 'required',
            'no_telp' => 'required'
        ]);

        $siswa = Siswa::create($request->all());

        User::create([
            'id_siswa' => $siswa->id,
            'name' => $request->nama,
            'username' => $request->nis,
            'password' => Hash::make($request->nis),
            'type' => 0
        ]);

        toast('Berhasil tambah data','success');
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $student)
    {
        $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'rombel' => 'required',
            'no_telp' => 'required'
        ]);

        $student->update($request->all());

        toast('Berhasil ubah data','success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Siswa::where('id',$id)->delete();
        User::where('id_siswa',$id)->delete();

        toast('Berhasil hapus data','info');
        return back();
    }
}
