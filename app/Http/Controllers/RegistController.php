<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistController extends Controller
{
    public function index() 
    {
        return view('auth.regist');
    }

    public function store(Request $request) 
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'username' => 'required|min:3|max:10|unique:users',
            'password' => 'required|min:3|max:10',
            'alamat' => 'required|max:255'
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        // $request->session()->flash('success', 'Registration Successful! Plesae Login!');
        
        return redirect('/login')->with('success', 'Registration Successful! Plesae Login!');
    }
}
