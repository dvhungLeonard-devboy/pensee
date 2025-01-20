<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            [
                'name' => 'Đặng Việt Cường',
                'email' => 'cuongdv@pensee.com.vn',
                'phone' => '0969969969',
                'address' => 'Khu đô thị Lideco',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dương Bích Hồng',
                'email' => 'hongdb@pensee.com.vn',
                'phone' => '0983830785',
                'address' => 'Khu 5, Thị trấn Trạm Trôi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hoàng Huyền Trang',
                'email' => 'tranghh@pensee.com.vn',
                'phone' => '0868868686',
                'address' => 'Đông Triều, Quảng Ninh',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
