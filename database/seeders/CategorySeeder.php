<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Điện thoại', 'description' => 'Các loại điện thoại thông minh'],
            ['name' => 'Laptop', 'description' => 'Các loại máy tính xách tay'],
            ['name' => 'Tablet', 'description' => 'Các loại máy tính bảng'],
            ['name' => 'Phụ kiện', 'description' => 'Các loại phụ kiện công nghệ'],
        ]);
    }
}
