<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datasiswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'NISN',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'notlpn',
        'jeniskelamin',
    ];
}
