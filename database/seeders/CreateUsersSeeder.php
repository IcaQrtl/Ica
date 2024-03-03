<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CreateAdminUserSeeder::class,
            CreateGuruUserSeeder::class,
            CreateSiswaUserSeeder::class,
        ]);

    }
}
