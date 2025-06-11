<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo tài khoản Admin
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@techshop.com',
            'password' => Hash::make('password'), // Mật khẩu là "password"
            'role_id' => 1, // Giả sử ID của Admin trong bảng roles là 1
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
