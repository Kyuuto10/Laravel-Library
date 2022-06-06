<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Rayon;
use App\Models\Rombel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $member = Member::all();

        // return view('members.index', compact('members'));
         $members = Member::latest()->paginate(5);

         return view('members.index',compact('members'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $rombel = Rombel::all();
        $rayon = Rayon::all();
        return view('members.create',compact('rombel','rayon'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        // 'nis' => 'required',
        // 'nama_member' => 'required',
        // 'jk' => 'required',
        // 'rayon' => 'required',
        // 'rombel' => 'required',
        // ]);

        // Member::create($request->all());

        Member::create([
            'nis' => $request->nis,
            'nama_member' => $request->nama_member,
            'jk' => $request->jk,
            'rayon' => $request->rayon,
            'rombel' => $request->rombel
        ]);

        return redirect()->route('members.index')
                        ->with('msg','Data Berhasil Disimpan');
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
        $member = Member::find($id);
        $rayon = Rayon::all();
        $rombel = Rombel::all();
        return view('members.edit', compact('member','rayon','rombel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $request->validate([
            'nis' => $request->nis,
            'nama_member' => $request->nama_member,
            'jk' => $request->jk,
            'rayon' => $request->rayon,
            'rombel' => $request->rombel
        ]);

        $member->update($request->all());

        return redirect()->route('members.index')
                        ->with('msg','Berhasil Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();

        return redirect()->route('members.index')
                        ->with('msg','Data Berhasil Dihapus');
    }
}
