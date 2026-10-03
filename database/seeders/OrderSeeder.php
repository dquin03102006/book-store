<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customer1 = DB::table('users')
            ->where('email', 'customer1@bookstore.com')
            ->value('id');

        $customer2 = DB::table('users')
            ->where('email', 'customer2@bookstore.com')
            ->value('id');

        $book1 = DB::table('books')
            ->where('title', 'Nhà Giả Kim')
            ->value('id');

        $book2 = DB::table('books')
            ->where('title', 'Tuổi Trẻ Đáng Giá Bao Nhiêu')
            ->value('id');

        $book3 = DB::table('books')
            ->where('title', 'Đắc Nhân Tâm')
            ->value('id');

        $order1 = DB::table('orders')->updateOrInsert(
            [
                'user_id' => $customer1,
                'shipping_phone' => '0901234567',
            ],
            [
                'total_amount' => 164000,
                'status' => 'completed',
                'shipping_name' => 'Khách hàng 1',
                'shipping_address' => 'TP. Hồ Chí Minh',
                'payment_method' => 'cod',
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );

        $orderId1 = DB::table('orders')
            ->where('user_id', $customer1)
            ->where('shipping_phone', '0901234567')
            ->value('id');

        DB::table('order_items')->updateOrInsert(
            [
                'order_id' => $orderId1,
                'book_id' => $book1,
            ],
            [
                'quantity' => 1,
                'price' => 79000,
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );

        DB::table('order_items')->updateOrInsert(
            [
                'order_id' => $orderId1,
                'book_id' => $book2,
            ],
            [
                'quantity' => 1,
                'price' => 85000,
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );

        DB::table('orders')->updateOrInsert(
            [
                'user_id' => $customer2,
                'shipping_phone' => '0907654321',
            ],
            [
                'total_amount' => 99000,
                'status' => 'pending',
                'shipping_name' => 'Khách hàng 2',
                'shipping_address' => 'TP. Hồ Chí Minh',
                'payment_method' => 'cod',
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );

        $orderId2 = DB::table('orders')
            ->where('user_id', $customer2)
            ->where('shipping_phone', '0907654321')
            ->value('id');

        DB::table('order_items')->updateOrInsert(
            [
                'order_id' => $orderId2,
                'book_id' => $book3,
            ],
            [
                'quantity' => 1,
                'price' => 99000,
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );
    }
}
