<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'user@ctfl.space',
            'password' => bcrypt('Schnell33'),
            'is_admin' => true,
        ]);
    }
}
