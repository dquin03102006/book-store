<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            1 => [
                'name' => 'Lãng mạn',
                'description' => 'Những câu chuyện tình yêu, tình cảm và các mối quan hệ.',
            ],
            2 => [
                'name' => 'Văn học thiếu nhi',
                'description' => 'Sách truyện và tác phẩm phù hợp với trẻ em, thiếu nhi.',
            ],
            3 => [
                'name' => 'Văn học hiện đại',
                'description' => 'Các tác phẩm văn học hiện đại trong và ngoài nước.',
            ],
            4 => [
                'name' => 'Trinh thám – Kinh dị',
                'description' => 'Những câu chuyện phá án, điều tra bí ẩn và kinh dị.',
            ],
            5 => [
                'name' => 'Phiêu lưu – Ly kỳ',
                'description' => 'Những hành trình khám phá, phiêu lưu và tình tiết ly kỳ.',
            ],
        ];

        foreach ($categories as $id => $category) {
            DB::table('categories')
                ->where('id', $id)
                ->update($category);
        }
    }
}