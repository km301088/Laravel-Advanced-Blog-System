<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'krish',
            'email' => 'krish@example.com',
            'password' => Hash::make('12345'),
            'role' => 'user',
        ]);
    }
}
