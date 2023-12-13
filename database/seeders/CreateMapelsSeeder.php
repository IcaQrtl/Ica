<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\matapelajaran;

class CreateMapelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mapel = [
            [
                'id' => '1',
                'nama' => 'Bahasa Indonesia'

            ],
            [
                'id' => '2',
                'nama' => 'Bahasa Inggris'
            ],
            [
                'id' => '3',
                'nama' => 'Matematika'
            ]
        ];

        foreach($mapel as $key => $value){
            matapelajaran::create($value);
        }
    }
}
