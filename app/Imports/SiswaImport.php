<?php

namespace App\Imports;

use App\Models\datasiswa;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements WithHeadingRow, ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);

        $user = new User([
            'username' => $row['nisn'],
            'name' => $row['nama'],
            'password' => Hash::make("12345678"),
            'role_id' => 3,
        ]);
        $user->save();

        $siswa = new datasiswa([
            'NISN' => $row['nisn'],
            'nama' => $row['nama'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tanggal_lahir' => $row['tanggal_lahir'],
            'alamat' => $row['alamat'],
            'notlpn' => $row['notlpn'],
            'jeniskelamin' => $row['jeniskelamin'],
            'user_id' => $user->id,
            'kelas_id' => $row['kelas_id'],
        ]);
        $siswa->save();

    }
}
