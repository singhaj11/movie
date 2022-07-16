<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
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
                'name' => 'Admin User',
                'email' => 'admin@admin.com',
                'password' => bcrypt('Admin@123'),
                'role' => 1
            ],
            [
                'name' => 'Normal User',
                'email' => 'user@user.com',
                'password' => bcrypt('password'),
            ],
        ];
        foreach ($users as $user) {
            if (!(User::where('email', $user['email'])->exists())) {
                User::create($user);
            }
        }
    }
}
