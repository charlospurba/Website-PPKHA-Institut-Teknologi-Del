<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Membuat akun admin 
        User::create([
            'id' => 1,
            'name' => 'User Admin',
            'email' => 'admin@del.ac.id',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'remember_token' => Str::random(10),

        ]);

        // Membuat 5 akun member secara random 
        User::factory()->count(5)->create();
    }
}
