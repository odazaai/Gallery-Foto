<?php

namespace App\Models;

use App\Models\Like;
use App\Models\Komentar;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Foto extends Model
{
    // protected $primaryKey = 'id';
    protected $fillable = [
        'judul_foto',
        'deskripsi_foto',
        'image',
        'user_id'
    ];

    public $timestamps = true;

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function komen()
    {
        return $this->hasMany(Komentar::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    
    public function userLiked()
    {
        return $this->likes()->where('user_id', Auth::id())->exists();
    }

    public function scopeFilter (Builder $query) 
    {
        $query->where('judul_foto', 'like', '%' . request('search'). '%');
    }

public function albums()
{
    return $this->belongsToMany(Album::class);
}

}
