<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Album;
use App\Models\Komentar;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index(): View
    {
        return view('content.photo', [
            'fotos' => Foto::filter()->latest()->get(),
        ]);
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */

     public function store(Request $request) : RedirectResponse 
     {
        // dd($request);
        $validatedData = $request->validate([
            'judul_foto' => 'required|max:255',
            'deskripsi_foto' => 'required|max:255',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
       ]);

       $validatedData['user_id'] = Auth::id();
    //    dd($validatedData);  

       $image = $request->file('image');
       $image->store('images');


       if($request->file('image')){
           $validatedData['image'] = $request->file('image')->store('images');
       }
       
       // $validatedData['user_id'] = Auth::user()->id;

       Foto::create($validatedData);
      

       return back()->with('bagus', 'Files Has Been Uploaded');

        //  return redirect()->route('content.photo')->with(['success' => 'Data Berhasil Disimpan!']);
     }

    public function show($id)
    {
        // $foto = foto::withCount('komen')->findOrFail($id);
        $foto = Foto::with('komen.user')->findOrFail($id);
        // return $fotoid;
        // $foto = DB::table('fotos')->where('id', $id)->first();
        if(!$foto) {
            abort(404);
        }
        return view('content.detail', ['foto' => $foto]);
    // }
    }

    public function edit($id) 
    {
        $foto = Foto::findOrFail($id);

        // dd($foto);

        if (Auth::id() !== $foto->user_id) {
            abort(403, 'Anda tidak memiliki akses untuk mengedit foto ini.');
        }
    
        return view('content.modal-edit', ['foto' => $foto]);
    }
    

    public function update(Request $request, $id) 
    {
        $request->validate([
            'judul_foto' => 'required|max:255',
            'deskripsi_foto' => 'required|max:255',
       ]);

    //    dd($request);

        DB::table('fotos')->where('id', $id)->update([
            'judul_foto' => $request->judul_foto,
            'deskripsi_foto' => $request->deskripsi_foto,
        ]);


        // foto::where('id', $request->id)->update($validatedData);

        return back();
    }

    public function delete($id) 
    {
        $foto = Foto::findOrFail($id);
    
        // Cek apakah pengguna yang login adalah pemilik foto
        if (Auth::id() !== $foto->user_id) {
            abort(403, 'Anda tidak memiliki akses untuk menghapus foto ini.');
        }
    
        $foto->delete();
    
        return redirect('/foto')->with('anjay', 'Foto berhasil dihapus.');
    }


// public function showPhotoDetail($id)
// {
//     $foto = Foto::findOrFail($id); // Retrieve the specific photo by ID
//     $albums = Album::all(); // Retrieve all albums to populate the dropdown

//     return view('content.detail', compact('foto', 'albums'));
// }

// public function like($id)
// {
//     $foto = Foto::findOrFail($id);
//     $user = auth()->users();

//     // Cek apakah user sudah melakukan "like" atau belum
//     if ($foto->likes()->where('user_id', $user->id)->exists()) {
//         // Jika sudah, hapus "like" (unlike)
//         $foto->likes()->where('user_id', $user->id)->delete();
//         $liked = false;
//     } else {
//         // Jika belum, tambahkan "like"
//         $foto->likes()->create(['user_id' => $user->id]);
//         $liked = true;
//     }

//     return response()->json([
//         'liked' => $liked,
//         'like_count' => $foto->likes()->count()
//     ]);
// }
    
}