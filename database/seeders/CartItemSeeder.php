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
            ->where('title', 'Nhà Giả Kim')
            ->value('id');

        $book2 = DB::table('books')
            ->where('title', 'Lập Trình Python Cơ Bản')
            ->value('id');

        $book3 = DB::table('books')
            ->where('title', 'English Grammar in Use')
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
