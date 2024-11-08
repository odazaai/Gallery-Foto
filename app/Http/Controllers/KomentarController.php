<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KomentarController extends Controller
{
    public function store(Request $request, $fotoId)
    {
        $request->validate([
            'isi_komen' => 'required|string|max:255',
        ]);

        // dd($request);

        Komentar::create([
            'user_id' => Auth::id(),
            'foto_id' => $fotoId,
            'isi_komen' => $request->input('isi_komen'),
        ]);


        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $komentar = Komentar::findOrFail($id);
    
        // Check if the authenticated user is the comment owner or photo owner
        if (Auth::id() !== $komentar->user_id && Auth::id() !== $komentar->foto->user_id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menghapus komentar ini.');
        }
    
        $komentar->delete();
    
        return redirect()->back()->with('success', 'Komentar berhasil dihapus.');
    }
    

}
