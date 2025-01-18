<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_groups')->insert([
            [
                'name' => 'Thuốc giảm đau phổ biến',
                'slug' => Str::slug('thuoc-giam-dau'),
                'description' => 'Nhóm các loại thuốc giảm đau thông dụng',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sản phẩm chăm sóc da',
                'slug' => Str::slug('cham-soc-da'),
                'description' => 'Mỹ phẩm chăm sóc da hàng ngày',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Vitamin bổ sung',
                'slug' => Str::slug('vitamin-bo-sung'),
                'description' => 'Vitamin giúp tăng sức khỏe',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
