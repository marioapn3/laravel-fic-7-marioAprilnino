<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(20)->create();
        User::create([
            'name' => 'Mario Aprilnino',
            'email' => 'mario@gmail.com',
            'role' => 'admin',
            'email_verified_at' => now(),
            'phone' => '00000000000',
            'bio' => 'keep learning',
            'password' => Hash::make('mario1234')
        ]);

        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'role' => 'superadmin',
            'email_verified_at' => now(),
            'phone' => '00000000000',
            'bio' => 'keep learning',
            'password' => Hash::make('superadmin@gmail.com')
        ]);
    }
}
