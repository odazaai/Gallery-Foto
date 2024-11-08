<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function showUsers()
    {
        $users = User::all();
        return view('admin.user', compact('users'));
    }

    public function showFoto()
    {
        $fotos = Foto::with('user')->get();
        // dd($posts);
        return view('admin.index', compact('fotos'));
    }

    public function destroy($id)
    {
        $foto = Foto::findOrFail($id);  

        if ($foto->image) {
            Storage::delete($foto->image);
        }

        $id = DB::table('fotos')->where('id', $id)->delete();

        return redirect('/admin')->with('success', 'Files Has Been Deleted');
    }

    public function deleteuser($id)
    {
        $users = User::findOrFail($id);  

        $id = DB::table('users')->where('id', $id)->delete();

        return redirect('/admin/users')->with('success', 'Files Has Been Deleted');
    }
}
