<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            'name'  => 'Admin',
            'email' => 'admin@admin.com',
            'role'  => 'admin',
            'password'  => 'admin123'
        ]);
        User::create([
            'name'  => 'User',
            'email' => 'user@user.com',
            'role'  => 'user',
            'password'  => 'user123'
        ]);
        User::create([
            'name'  => 'Isaman',
            'email' => 'isman@user.com',
            'role'  => 'admin',
            'password'  => 'admin123'
        ]);
        User::create([
            'name'  => 'Vauzi',
            'email' => 'vauzi@user.com',
            'role'  => 'uer',
            'password'  => 'user123'
        ]);
        User::create([
            'name'  => 'Yusalam',
            'email' => 'yuslam@user.com',
            'role'  => 'user',
            'password'  => 'user123'
        ]);
    }
}
