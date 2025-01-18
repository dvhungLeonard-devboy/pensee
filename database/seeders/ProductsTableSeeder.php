<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Paracetamol 500mg',
                'slug' => Str::slug('paracetamol-500mg'),
                'description' => 'Thuốc giảm đau, hạ sốt',
                'price' => 25000,
                'original_price' => 30000,
                'sale_price' => 20000,
                'tags' => json_encode(['giảm đau', 'hạ sốt']),
                'stock_quantity' => 100,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Aspirin',
                'slug' => Str::slug('aspirin'),
                'description' => 'Thuốc giảm đau, chống viêm',
                'price' => 50000,
                'original_price' => 60000,
                'sale_price' => 45000,
                'tags' => json_encode(['giảm đau', 'chống viêm']),
                'stock_quantity' => 150,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Thuốc ho Prospan',
                'slug' => Str::slug('thuoc-ho-prospan'),
                'description' => 'Siro trị ho',
                'price' => 80000,
                'original_price' => 90000,
                'sale_price' => 75000,
                'tags' => json_encode(['trị ho', 'siro']),
                'stock_quantity' => 80,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
