<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'username' => '12345',
                'name' => 'Admin',
                'password' => bcrypt('12345678'),
                'role_id' => 1
            ]
        ];

        foreach($user as $key => $value){
            User::create($value);
        }
    }
}
