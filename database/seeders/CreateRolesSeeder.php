<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Roles;

class CreateRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id' => '1',
                'nama' => 'Admin'

            ],
            [
                'id' => '2',
                'nama' => 'Guru'
            ],
            [
                'id' => '3',
                'nama' => 'Siswa'
            ]
        ];

        foreach($roles as $key => $value){
            Roles::create($value);
        }
    }
}
