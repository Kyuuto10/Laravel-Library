<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.profile.index', compact('users'));
    }

   public function editProfile()
   {
        $id = Auth::user()->id;
        $editUser = User::find($id);
        return view('admin.profile.edit', compact('editUser'));
   }

   public function storeProfile(Request $request)
   {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;

        if($request->file('profile_image')){
            $file = $request->file('profile_image');
            $fileName = date('YmdHis').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$fileName);
            $data['profile_image'] = $fileName;
        }
        $data->save();

        toast('Berhasil Mengubah Profil','success');
        return redirect()->route('profile.index');
   }
}
