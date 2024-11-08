<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Usamamuneerchaudhary\Commentify\Traits\Commentable;

class Komentar extends Model
{

    // use HasFactory, Commentable;


    // protected $fillable = [
    //     'isi_komen',
    //     'foto_id',
    //     'user_id'
    // ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'id');
    // }

    // public function foto()
    // {
    //     return $this->belongsTo(User::class, 'id');
    // }

    use HasFactory;

    protected $fillable = ['user_id', 'foto_id', 'isi_komen'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function foto()
    {
        return $this->belongsTo(Foto::class);
    }
}
