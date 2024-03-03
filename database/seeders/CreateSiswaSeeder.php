<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\datasiswa;

class CreateSiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $siswa = [
            //Siswa X TKJ A 
            [
                'NISN' => '0075388947',
                'nama' => 'Adam Rohman',
                'tempat_lahir' => 'cianjur',
                'tanggal_lahir' => '2000-11-10',
                'alamat' => 'Kp Mandala Kec Ciranjang Kab Cianjur',
                'notlpn' => '0895404120901',
                'jeniskelamin' => 'Laki-Laki',
                'user_id' => 13,
                'kelas_id' => 1

            ],
            [
                'NISN' => '0076566408',
                'nama' => 'Ahmad Nasihin',
                'tempat_lahir' => 'cianjur',
                'tanggal_lahir' => '2000-11-10',
                'alamat' => 'Kp Mandala Kec Ciranjang Kab Cianjur',
                'notlpn' => '0895404120902',
                'jeniskelamin' => 'Laki-Laki',
                'user_id' => 14,
                'kelas_id' => 1

            ],
            [
                'NISN' => '0068701035',
                'nama' => 'Amatulloh Faridah Fauziyyah',
                'tempat_lahir' => 'cianjur',
                'tanggal_lahir' => '2000-11-10',
                'alamat' => 'Kp Mandala Kec Ciranjang Kab Cianjur',
                'notlpn' => '0895404120903',
                'jeniskelamin' => 'Perempuan',
                'user_id' => 15,
                'kelas_id' => 1

            ],
            [
                'NISN' => '0075690032',
                'nama' => 'Hasna Tsania Sophian',
                'tempat_lahir' => 'cianjur',
                'tanggal_lahir' => '2000-11-10',
                'alamat' => 'Kp Mandala Kec Ciranjang Kab Cianjur',
                'notlpn' => '0895404120904',
                'jeniskelamin' => 'Perempuan',
                'user_id' => 16,
                'kelas_id' => 1
            ],
            [
                'NISN' => '0063263288',
                'nama' => 'Salman Ariasipa',
                'tempat_lahir' => 'cianjur',
                'tanggal_lahir' => '2000-11-10',
                'alamat' => 'Kp Mandala Kec Ciranjang Kab Cianjur',
                'notlpn' => '0895404120905',
                'jeniskelamin' => 'Laki-Laki',
                'user_id' => 17,
                'kelas_id' => 1

            ],
            //Siswa X TKJ B 
            [
                'NISN' => '0066230799',
                'nama' => 'Akmal Fauzan',
                'tempat_lahir' => 'cianjur',
                'tanggal_lahir' => '2000-11-10',
                'alamat' => 'Kp Mandala Kec Ciranjang Kab Cianjur',
                'notlpn' => '0895404120906',
                'jeniskelamin' => 'Laki-Laki',
                'user_id' => 18,
                'kelas_id' => 2

            ],
            [
                'NISN' => '0052541899',
                'nama' => 'Anisa Septiani',
                'tempat_lahir' => 'cianjur',
                'tanggal_lahir' => '2000-11-10',
                'alamat' => 'Kp Mandala Kec Ciranjang Kab Cianjur',
                'notlpn' => '0895404120907',
                'jeniskelamin' => 'Perempuan',
                'user_id' => 19,
                'kelas_id' => 2

            ],
            [
                'NISN' => '0078508454',
                'nama' => 'Anjani',
                'tempat_lahir' => 'cianjur',
                'tanggal_lahir' => '2000-11-10',
                'alamat' => 'Kp Mandala Kec Ciranjang Kab Cianjur',
                'notlpn' => '0895404120908',
                'jeniskelamin' => 'Perempuan',
                'user_id' => 20,
                'kelas_id' => 2

            ],
            [
                'NISN' => '0062514496',
                'nama' => 'Dani Safaat',
                'tempat_lahir' => 'cianjur',
                'tanggal_lahir' => '2000-11-10',
                'alamat' => 'Kp Mandala Kec Ciranjang Kab Cianjur',
                'notlpn' => '0895404120909',
                'jeniskelamin' => 'Laki-Laki',
                'user_id' => 21,
                'kelas_id' => 2
            ],
            [
                'NISN' => '0067845644',
                'nama' => 'Nazmudin',
                'tempat_lahir' => 'cianjur',
                'tanggal_lahir' => '2000-11-10',
                'alamat' => 'Kp Mandala Kec Ciranjang Kab Cianjur',
                'notlpn' => '0895404120910',
                'jeniskelamin' => 'Laki-Laki',
                'user_id' => 22,
                'kelas_id' => 2

            ],
        ];

        foreach($siswa as $key => $value){
            datasiswa::create($value);
        }
    }
}
