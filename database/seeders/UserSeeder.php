<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        $users = [
            [
                'name' => 'Admin',
                'username' => 'admin',
                'type' => 1,
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'User',
                'username' => 'user',
                'type' => 0,
                'password' => bcrypt('user'),
            ],
            [
                'name' => 'Petugas',
                'username' => 'petugas',
                'type' => 2,
                'password' => bcrypt('petugas'),
            ]
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
