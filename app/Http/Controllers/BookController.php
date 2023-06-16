<?php

namespace App\Http\Controllers;

use App\Models\{Book,Category};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $categories = Category::all();
        return view('admin.book.index',compact('books','categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',            
            'stok' => 'required',
            'cover' => 'image|mimes:jpeg,jpg,png,svg',
        ]);

        $input = $request->all();
  
        if ($image = $request->file('cover')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['cover'] = $profileImage;
        }
    
        Book::create($input);
        
              
        // $book = Book::create([
        //     'category' => $request->category,
        //     'judul' => $request->judul,
        //     'pengarang' => $request->pengarang,
        //     'penerbit' => $request->penerbit,
        //     'tahun_terbit' => $request->tahun_terbit,            
        //     'stok' => $request->stok,
        //     'cover' => $request->cover,
        //     ]);
        // if($request->file('cover')){
        //     $file = $request->file('cover');
        //     $fileName = $file->getClientOriginalName();
        //     $file->move(public_path('images'), $fileName);
        //     $book['cover'] = $fileName;
        // }

        // $book->save();

        toast('Berhasil tambah data','success');
        return back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required',
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',            
            'stok' => 'required',            
        ]);

        $input = $request->all();
  
        $images = DB::select('SELECT cover FROM books WHERE id = '.$id);
        foreach($images as $img){         
            $foto = $img->cover;   
                if($img = $request->file('cover')) {
                    if(File::exists('images/'.$foto)){
                        File::delete('images/'.$foto);                        
                    }
                    $destinationPath = 'images/';
                    $profileImage = date('YmdHis') . "." . $img->getClientOriginalExtension();
                    $img->move($destinationPath, $profileImage);
                    $input['cover'] = $profileImage;
            }
        }

        $book = Book::find($id);      
        $book->update($input);

        toast('Berhasil ubah data','success');
        return back();
    }

    public function destroy($id)
    {        
        $images = DB::select('SELECT cover FROM books WHERE id = '.$id);
        foreach($images as $img){
            if(File::exists('images/'.$img->cover)){
                File::delete('images/'.$img->cover);
            }
        }
        $book = Book::find($id);
        $book->delete();

        toast('Berhasil hapus data','success');
        return back();        
    }
}
