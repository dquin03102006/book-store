<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
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

        DB::table('reviews')->updateOrInsert(
            [
                'user_id' => $customer1,
                'book_id' => $book1,
            ],
            [
                'rating' => 5,
                'comment' => 'Sách hay, nội dung rất ý nghĩa.',
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );

        DB::table('reviews')->updateOrInsert(
            [
                'user_id' => $customer1,
                'book_id' => $book2,
            ],
            [
                'rating' => 4,
                'comment' => 'Nội dung dễ đọc và khá hữu ích.',
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );

        DB::table('reviews')->updateOrInsert(
            [
                'user_id' => $customer2,
                'book_id' => $book3,
            ],
            [
                'rating' => 5,
                'comment' => 'Một cuốn sách đáng đọc.',
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );
    }
}
