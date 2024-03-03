<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datakelas extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_kelas',
        'wali_id',
    ];
}
