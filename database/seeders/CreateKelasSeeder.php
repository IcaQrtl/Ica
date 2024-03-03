<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\datakelas;

class CreateKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $table->id();
        // $table->string('nama_kelas');
        // $table->integer('wali_id');
        // $table->timestamps();
        $kelas = [
            [
                'nama_kelas' => 'X TKJ A',
                'wali_id' => 1
            ],
            [
                'nama_kelas' => 'X TKJ B',
                'wali_id' => 2
            ],
            [
                'nama_kelas' => 'XI TKJ A',
                'wali_id' => 3
            ],
            [
                'nama_kelas' => 'XI TKJ B',
                'wali_id' => 4
            ],
            [
                'nama_kelas' => 'XII TKJ A',
                'wali_id' => 5
            ],
        ];

        foreach($kelas as $key => $value){
            datakelas::create($value);
        }
    }
}
