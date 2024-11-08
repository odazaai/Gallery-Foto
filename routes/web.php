<?php

use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\Foto;
use App\Models\Komentar;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KomentarController;


Route::get('/', function () {
    return view('content.photo', [
        'fotos' =>Foto::filter()->latest()->get()]);
})->middleware('auth');

Route::get('/album', function () {
    return view('content.album');
})->middleware('auth');

Route::get('/user', function () {
    return view('admin.user');
});


// crud
Route::get('/foto', [FotoController::class, 'index'])->middleware('auth');
Route::post('/foto', [FotoController::class, 'store'])->name('image.store')->middleware('auth');
Route::get('/foto/{id}/detail', [FotoController::class, 'show'])->middleware('auth');

Route::get('/foto/{id}/edit', [FotoController::class, 'edit'])->middleware('auth');
Route::patch('/foto/{id}/update', [FotoController::class, 'update'])->middleware('auth');
Route::get('/foto/{id}/delete', [FotoController::class, 'delete'])->middleware('auth');

// register
Route::get('/regist', [RegistController::class, 'index']);
Route::post('/regist', [RegistController::class, 'store']);

// login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/login', [LoginController::class, 'adminauthenticate'])->name('login.authenticate');

// logout
Route::post('/logout', [LoginController::class, 'logout']);

// profile
Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');
Route::get('/profile/{id}/show', [ProfileController::class, 'show'])->middleware('auth');

// komen
Route::post('/foto/{id}/komen', [KomentarController::class, 'store'])->name('foto.komen')->middleware('auth');
Route::delete('/komentar/{id}', [KomentarController::class, 'destroy'])->name('komentar.destroy')->middleware('auth');

// like
Route::get('/post/{post}/like', [LikeController::class, 'likee'])->name('foto.like')->middleware('auth');

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin', [AdminController::class, 'showFoto'])->name('admin.foto');
    Route::get('/admin/users', [AdminController::class, 'showUsers'])->name('admin.user');
    Route::delete('/admin/{id}/delete', [AdminController::class, 'deleteuser'])->name('admin.deleteUser');
    Route::get('/admin/{id}/delete', [AdminController::class, 'destroy'])->name('admin.deletePost');
});
