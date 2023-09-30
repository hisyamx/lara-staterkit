<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin Demo',
            'email' => 'admindemo@mail.com',
            'password' => Hash::make('admin1234'),
            'email_verified_at' => now(),
            'role' => "admin",
        ]);

        \App\Models\User::factory()->create([
            'name' => 'User Demo',
            'email' => 'userdemo@mail.com',
            'password' => Hash::make('user1234'),
            'email_verified_at' => now(),
            'role' => "user",
        ]);

        $this->call([
            MasterProductSeeder::class,
            MasterTransactionSeeder::class,
        ]);
    }
}
