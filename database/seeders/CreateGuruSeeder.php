<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\dataguru;

class CreateGuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $guru = [
            //Guru as Wali Kelas
            [
                'NIP' => '101001',
                'nama' => 'Ocsa',
                'jeniskelamin' => 'Perempuan',
                'notlpn' => '085173230965',
                'user_id' => 2,
            ],
            [
                'NIP' => '101002',
                'nama' => 'Rizky',
                'jeniskelamin' => 'Laki-Laki',
                'notlpn' => '085173230965',
                'user_id' => 3,
            ],
            [
                'NIP' => '101003',
                'nama' => 'Amira',
                'jeniskelamin' => 'Perempuan',
                'notlpn' => '085173230965',
                'user_id' => 4,
            ],
            [
                'NIP' => '101004',
                'nama' => 'Widia',
                'jeniskelamin' => 'Perempuan',
                'notlpn' => '085173230965',
                'user_id' => 5,
            ],
            [
                'NIP' => '101005',
                'nama' => 'Riry',
                'jeniskelamin' => 'Perempuan',
                'notlpn' => '085173230965',
                'user_id' => 6,
            ],
            //X TKJ
            [
                'NIP' => '101006',
                'nama' => 'Anwar',
                'jeniskelamin' => 'Laki-Laki',
                'notlpn' => '085223381123',
                'user_id' => 7,
            ],
            [
                'NIP' => '101007',
                'nama' => 'Budi',
                'jeniskelamin' => 'Laki-Laki',
                'notlpn' => '08515743066',
                'user_id' => 8,
            ],
            [
                'NIP' => '101008',
                'nama' => 'Putri',
                'jeniskelamin' => 'Perempuan',
                'notlpn' => '083827465231',
                'user_id' => 9,
            ],
            //XI & XII TKJ
            [
                'NIP' => '101009',
                'nama' => 'Aprill',
                'jeniskelamin' => 'Perempuan',
                'notlpn' => '089623381123',
                'user_id' => 10,
            ],
            [
                'NIP' => '101010',
                'nama' => 'Putra',
                'jeniskelamin' => 'Laki-Laki',
                'notlpn' => '08235743066',
                'user_id' => 11,
            ],
            [
                'NIP' => '101011',
                'nama' => 'Suci',
                'jeniskelamin' => 'Perempuan',
                'notlpn' => '081827465231',
                'user_id' => 12,
            ],
        ];

        foreach($guru as $key => $value){
            dataguru::create($value);
        }
    }
}
