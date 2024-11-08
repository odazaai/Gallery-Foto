<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function index() 
    {
        $user = Auth::user();
        $fotos = Foto::where('user_id', $user->id)->get();
        return view('content.profile', compact('user', 'fotos'));
    }

    // public function showProfile($id)
    // {
    //     $user = User::find($id);
    //     $fotos = Foto::where('id_user', $id()->get());
    //     return view('content.profile', compact('user', 'fotos'));
    // }
    
    public function show($id)
    {
        
        $profile = DB::table('users')->where('id', $id)->first();
        if(!$profile->user_id!==Auth::id()) {
            abort(404, 'Unauthorized action');
        }
        return view('content.profile', ['profile' => $profile]);
    }
}
