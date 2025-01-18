<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_categories')->insert([
            [
                'product_id' => 1,
                'category_id' => 4,
            ],
            [
                'product_id' => 2,
                'category_id' => 4,
            ],
            [
                'product_id' => 3,
                'category_id' => 5,
            ],
        ]);
    }
}
