<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            CategoriesTableSeeder::class,
            ProductsTableSeeder::class,
            ProductVariantsTableSeeder::class,
            ProductGroupsTableSeeder::class,
            ProductGroupMappingsTableSeeder::class,
            ProductCategoriesTableSeeder::class,
            ProductDiscountsTableSeeder::class,
        ]);
    }
}
