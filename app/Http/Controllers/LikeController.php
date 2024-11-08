<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Like;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function Likee($id)
    {
        $foto = Foto::findOrFail($id);
        $like = Like::where('foto_id', $foto->id)->where('user_id', auth::id())->first();
    
        if ($like) {
            // Jika sudah di-like, maka unlike
            $like->delete();
        } else {
            // Jika belum di-like, maka like
            Like::create([
                'user_id' => auth::id(),
                'foto_id' => $foto->id,
            ]);
        }
    
        return redirect()->back(); // Redirect kembali ke halaman sebelum
    }
}
