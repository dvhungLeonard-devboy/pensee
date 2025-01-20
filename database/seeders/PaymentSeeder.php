<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payments')->insert([
            [
                'order_id' => 1,
                'payment_method' => 'credit_card',
                'payment_status' => 'paid',
                'amount' => 100.00,
            ],
            [
                'order_id' => 2,
                'payment_method' => 'paypal',
                'payment_status' => 'pending',
                'amount' => 50.00,
            ],
        ]);
    }
}
