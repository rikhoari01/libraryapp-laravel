<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $rand_id = rand(1, 999);
        User::create([
            'user_id' => 'ADM-' . $rand_id,
            'name' => 'Admin ' . $rand_id,
            'email' => 'admin' . $rand_id . '@libraryapp.com',
            'birthdate' => '000000',
            'phone' => '085895125342',
            'gender' => 'Laki-Laki',
            'password' => bcrypt('1q2w3e4r5t'),
            'address' => 'Libraryapp Building',
            'is_Admin' => 1,
        ]);
        User::create([
            'user_id' => 'ADM-001',
            'name' => 'Admin 001',
            'email' => 'admin001@libraryapp.com',
            'birthdate' => '000000',
            'phone' => '085895125342',
            'gender' => 'Laki-Laki',
            'password' => bcrypt('1q2w3e4r5t'),
            'address' => 'Libraryapp Building',
            'is_Admin' => 1,
        ]);
    }
}
