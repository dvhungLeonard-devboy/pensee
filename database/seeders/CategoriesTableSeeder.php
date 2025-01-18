<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Dược phẩm',
                'slug' => Str::slug('duoc-pham'),
                'description' => 'Sản phẩm liên quan đến thuốc',
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mỹ phẩm',
                'slug' => Str::slug('my-pham'),
                'description' => 'Sản phẩm chăm sóc sắc đẹp',
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Thực phẩm chức năng',
                'slug' => Str::slug('thuc-pham-chuc-nang'),
                'description' => 'Sản phẩm bổ sung dinh dưỡng',
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
