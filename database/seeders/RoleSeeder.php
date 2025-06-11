<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Thêm dòng này

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo 2 vai trò mặc định
        DB::table('roles')->insert([
            ['name' => 'Admin', 'description' => 'Quản trị viên hệ thống'],
            ['name' => 'Customer', 'description' => 'Khách hàng'],
        ]);
    }
}
