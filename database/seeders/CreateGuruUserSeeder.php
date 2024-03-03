<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateGuruUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            //Guru as Wali Kelas
            [
                'username' => '101001',
                'name' => 'Ocsa',
                'password' => bcrypt('12345678'),
                'role_id' => 2
            ],
            [
                'username' => '101002',
                'name' => 'Rizky',
                'password' => bcrypt('12345678'),
                'role_id' => 2
            ],
            [
                'username' => '101003',
                'name' => 'Amira',
                'password' => bcrypt('12345678'),
                'role_id' => 2
            ],
            [
                'username' => '101004',
                'name' => 'Widia',
                'password' => bcrypt('12345678'),
                'role_id' => 2
            ],
            [
                'username' => '101005',
                'name' => 'Riry',
                'password' => bcrypt('12345678'),
                'role_id' => 2
            ],
            //X TKJ 
            [
                'username' => '101006',
                'name' => 'Anwar',
                'password' => bcrypt('12345678'),
                'role_id' => 2
            ],
            [
                'username' => '101007',
                'name' => 'Budi',
                'password' => bcrypt('12345678'),
                'role_id' => 2
            ],
            [
                'username' => '101008',
                'name' => 'Putri',
                'password' => bcrypt('12345678'),
                'role_id' => 2
            ],
            //XI & XII TKJ
            [
                'username' => '101009',
                'name' => 'Aprill',
                'password' => bcrypt('12345678'),
                'role_id' => 2
            ],
            [
                'username' => '101010',
                'name' => 'Putra',
                'password' => bcrypt('12345678'),
                'role_id' => 2
            ],
            [
                'username' => '101011',
                'name' => 'Suci',
                'password' => bcrypt('12345678'),
                'role_id' => 2
            ],
        ];

        foreach($user as $key => $value){
            User::create($value);
        }
    }
}
