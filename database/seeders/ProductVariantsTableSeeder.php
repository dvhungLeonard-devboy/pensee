<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductVariantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_variants')->insert([
            [
                'product_id' => 1,
                'name' => 'Paracetamol 500mg vỉ 10 viên',
                'sku' => 'PARA-500-V10',
                'price' => 2500,
                'stock_quantity' => 500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 2,
                'name' => 'Aspirin 100mg vỉ 20 viên',
                'sku' => 'ASPIRIN-100-V20',
                'price' => 4500,
                'stock_quantity' => 400,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 3,
                'name' => 'Thuốc ho Prospan 100ml',
                'sku' => 'PROSPAN-100ML',
                'price' => 75000,
                'stock_quantity' => 200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
