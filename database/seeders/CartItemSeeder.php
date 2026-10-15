<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartItemSeeder extends Seeder
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
            ->where('title', 'BÀ BÁC KHỦNG KHIẾP')
            ->value('id');

        $book2 = DB::table('books')
            ->where('title', 'MUN ƠI, CHẠY ĐI')
            ->value('id');

        $book3 = DB::table('books')
            ->where('title', 'PHÍA SAU NGHI CAN X')
            ->value('id');
        DB::table('cart_items')->updateOrInsert(
            [
                'user_id' => $customer1,
                'book_id' => $book1,
            ],
            [
                'quantity' => 2,
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );

        DB::table('cart_items')->updateOrInsert(
            [
                'user_id' => $customer1,
                'book_id' => $book2,
            ],
            [
                'quantity' => 1,
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );

        DB::table('cart_items')->updateOrInsert(
            [
                'user_id' => $customer2,
                'book_id' => $book3,
            ],
            [
                'quantity' => 1,
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );
    }
}
