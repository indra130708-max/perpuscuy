<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'role_id' => 1,
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password')
        ]);

        // User 1
        User::create([
            'role_id' => 2,
            'name' => 'User1',
            'email' => 'user1@gmail.com',
            'password' => Hash::make('password')
        ]);

        // User 2
        User::create([
            'role_id' => 2,
            'name' => 'User2',
            'email' => 'user2@gmail.com',
            'password' => Hash::make('password')
        ]);
    }
}