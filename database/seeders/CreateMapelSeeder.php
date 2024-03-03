<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\matapelajaran;

class CreateMapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $table->id();
        // $table->string('nama');
        // $table->integer('id_kelas');
        // $table->integer('id_guru');
        // $table->timestamps();
        $mapel = [
            // X TKJ A
            [
                'nama' => 'Bahasa Indonesia',
                'kelas_id' => 1,
                'guru_id' => 6
            ],
            [
                'nama' => 'Bahasa Inggris',
                'kelas_id' => 1,
                'guru_id' => 7
            ],
            [
                'nama' => 'Matematika',
                'kelas_id' => 1,
                'guru_id' => 8
            ],
            // X TKJ B
            [
                'nama' => 'Bahasa Indonesia',
                'kelas_id' => 2,
                'guru_id' => 6
            ],
            [
                'nama' => 'Bahasa Inggris',
                'kelas_id' => 2,
                'guru_id' => 7
            ],
            [
                'nama' => 'Matematika',
                'kelas_id' => 2,
                'guru_id' => 8
            ],
            // XI TKJ A
            [
                'nama' => 'Bahasa Indonesia',
                'kelas_id' => 3,
                'guru_id' => 9
            ],
            [
                'nama' => 'Bahasa Inggris',
                'kelas_id' => 3,
                'guru_id' => 10
            ],
            [
                'nama' => 'Matematika',
                'kelas_id' => 3,
                'guru_id' => 11
            ],
            // XI TKJ B
            [
                'nama' => 'Bahasa Indonesia',
                'kelas_id' => 4,
                'guru_id' => 9
            ],
            [
                'nama' => 'Bahasa Inggris',
                'kelas_id' => 4,
                'guru_id' => 10
            ],
            [
                'nama' => 'Matematika',
                'kelas_id' => 4,
                'guru_id' => 11
            ],
            // XII TKJ A
            [
                'nama' => 'Bahasa Indonesia',
                'kelas_id' => 5,
                'guru_id' => 9
            ],
            [
                'nama' => 'Bahasa Inggris',
                'kelas_id' => 5,
                'guru_id' => 10
            ],
            [
                'nama' => 'Matematika',
                'kelas_id' => 5,
                'guru_id' => 11
            ]
        ];

        foreach($mapel as $key => $value){
            matapelajaran::create($value);
        }
    }
}
