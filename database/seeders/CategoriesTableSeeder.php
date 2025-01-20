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
            [
                'name' => 'Thuốc giảm đau',
                'slug' => Str::slug('thuoc-giam-dau'),
                'description' => 'Các loại thuốc giảm đau',
                'parent_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Thuốc ho',
                'slug' => Str::slug('thuoc-ho'),
                'description' => 'Các loại thuốc trị ho',
                'parent_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kem dưỡng da',
                'slug' => Str::slug('kem-duong-da'),
                'description' => 'Sản phẩm dưỡng ẩm và chăm sóc da',
                'parent_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
