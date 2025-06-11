<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
     public function run(): void
    {
        DB::table('suppliers')->insert([
            ['name' => 'Apple', 'contact_name' => 'Tim Cook', 'phone' => '123456789'],
            ['name' => 'Samsung', 'contact_name' => 'Lee Jae-yong', 'phone' => '987654321'],
            ['name' => 'Sony', 'contact_name' => 'Kenichiro Yoshida', 'phone' => '1122334455'],
        ]);
    }
}
