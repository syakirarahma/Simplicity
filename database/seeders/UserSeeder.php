<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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
            'email' => 'anandams268@gmail.com',
            'username' => 'anandams',
            'name' => 'anandams',
            'address' => 'patimuan',
            'password' => Hash::make('rahasia'),
            'status' => 'active',
            'roles' => 'ADMIN'
        ]);

        User::create([
            'email' => 'yoko@gmail.com',
            'username' => 'yoko',
            'name' => 'yoko',
            'address' => 'patimuan',
            'password' => Hash::make('12345678'),
            'status' => 'active',
            'roles' => 'ADMIN'
        ]);

        User::create([
            'email' => 'syakirarahma7@gmail.com',
            'username' => 'syakira',
            'name' => 'syakira',
            'address' => 'hatimu',
            'password' => Hash::make('12345678'),
            'status' => 'active',
            'roles' => 'USER'
        ]);
    }
}