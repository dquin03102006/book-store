<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('coupons')->updateOrInsert(
            ['code' => 'WELCOME10'],
            [
                'discount_type' => 'percent',
                'discount_value' => 10,
                'min_order_amount' => 100000,
                'quantity' => 100,
                'start_at' => now(),
                'end_at' => now()->addMonths(3),
                'is_active' => true,
            ]
        );

        DB::table('coupons')->updateOrInsert(
            ['code' => 'BOOK20'],
            [
                'discount_type' => 'percent',
                'discount_value' => 20,
                'min_order_amount' => 200000,
                'quantity' => 50,
                'start_at' => now(),
                'end_at' => now()->addMonths(2),
                'is_active' => true,
            ]
        );
    }
}
