<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class matapelajaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_mapel',
        'namamapel',
    ];
}
