<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductDiscountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_discounts')->insert([
            [
                'product_id' => 1,
                'discount_type' => 'percentage',
                'discount_value' => 10,
                'start_date' => now(),
                'end_date' => now()->addDays(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 2,
                'discount_type' => 'fixed_amount',
                'discount_value' => 5000,
                'start_date' => now(),
                'end_date' => now()->addDays(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 3,
                'discount_type' => 'percentage',
                'discount_value' => 15,
                'start_date' => now(),
                'end_date' => now()->addDays(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
