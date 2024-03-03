<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class CreateSiswaUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            //Siswa X TKJ A 
            [
                'username' => '0075388947',
                'name' => 'Adam Rohman',
                'password' => bcrypt('12345678'),
                'role_id' => 3
            ],
            [
                'username' => '0076566408',
                'name' => 'Ahmad Nasihin',
                'password' => bcrypt('12345678'),
                'role_id' => 3
            ],
            [
                'username' => '0068701035',
                'name' => 'Amatulloh Faridah Fauziyyah',
                'password' => bcrypt('12345678'),
                'role_id' => 3
            ],
            [
                'username' => '0075690032',
                'name' => 'Hasna Tsania Sophian',
                'password' => bcrypt('12345678'),
                'role_id' => 3
            ],
            [
                'username' => '0063263288',
                'name' => 'Salman Ariasipa',
                'password' => bcrypt('12345678'),
                'role_id' => 3
            ],
            //Siswa X TKJ B
            [
                'username' => '0066230799',
                'name' => 'Akmal Fauzan',
                'password' => bcrypt('12345678'),
                'role_id' => 3
            ],
            [
                'username' => '0052541899',
                'name' => 'Anisa Septiani',
                'password' => bcrypt('12345678'),
                'role_id' => 3
            ],
            [
                'username' => '0078508454',
                'name' => 'Anjani',
                'password' => bcrypt('12345678'),
                'role_id' => 3
            ],
            [
                'username' => '0062514496',
                'name' => 'Dani Safaat',
                'password' => bcrypt('12345678'),
                'role_id' => 3
            ],
            [
                'username' => '0067845644',
                'name' => 'Nazmudin',
                'password' => bcrypt('12345678'),
                'role_id' => 3
            ],
        ];

        foreach($user as $key => $value){
            User::create($value);
        }
    }
}
