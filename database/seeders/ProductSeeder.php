<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'iPhone 15 Pro Max 256GB',
                'category_id' => 1,
                'supplier_id' => 1,
                'unit_price' => 29990000,
                'stock_quantity' => 50,
                'description' => 'Siêu phẩm mới nhất từ Apple với chip A17 Pro mạnh mẽ.',
                'image' => '/images/iphone-15.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Samsung Galaxy S24 Ultra',
                'category_id' => 1,
                'supplier_id' => 2,
                'unit_price' => 28500000,
                'stock_quantity' => 40,
                'description' => 'Điện thoại cao cấp nhất của Samsung với bút S-Pen và camera đỉnh cao.',
                'image' => '/images/s24-ultra.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'MacBook Pro 14 inch M3',
                'category_id' => 2,
                'supplier_id' => 1,
                'unit_price' => 45000000,
                'stock_quantity' => 20,
                'description' => 'Laptop chuyên nghiệp cho công việc sáng tạo.',
                'image' => '/images/macbook-pro-14.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
