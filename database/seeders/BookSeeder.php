<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vanHoc = DB::table('categories')->where('name', 'Văn học')->value('id');
        $kinhTe = DB::table('categories')->where('name', 'Kinh tế')->value('id');
        $kyNang = DB::table('categories')->where('name', 'Kỹ năng sống')->value('id');
        $congNghe = DB::table('categories')->where('name', 'Công nghệ')->value('id');
        $ngoaiNgu = DB::table('categories')->where('name', 'Ngoại ngữ')->value('id');

        $books = [
            [
                'category_id' => $vanHoc,
                'title' => 'Nhà Giả Kim',
                'author' => 'Paulo Coelho',
                'price' => 79000,
                'quantity' => 20,
                'description' => 'Một câu chuyện truyền cảm hứng về hành trình theo đuổi ước mơ.',
                'image' => null,
            ],
            [
                'category_id' => $vanHoc,
                'title' => 'Tuổi Trẻ Đáng Giá Bao Nhiêu',
                'author' => 'Rosie Nguyễn',
                'price' => 85000,
                'quantity' => 15,
                'description' => 'Những chia sẻ về tuổi trẻ, học tập và trải nghiệm.',
                'image' => null,
            ],
            [
                'category_id' => $kinhTe,
                'title' => 'Đắc Nhân Tâm',
                'author' => 'Dale Carnegie',
                'price' => 99000,
                'quantity' => 25,
                'description' => 'Những nguyên tắc giao tiếp và ứng xử trong cuộc sống.',
                'image' => null,
            ],
            [
                'category_id' => $kinhTe,
                'title' => 'Nghĩ Giàu Và Làm Giàu',
                'author' => 'Napoleon Hill',
                'price' => 110000,
                'quantity' => 18,
                'description' => 'Những tư duy và nguyên tắc về thành công và tài chính.',
                'image' => null,
            ],
            [
                'category_id' => $kyNang,
                'title' => '7 Thói Quen Hiệu Quả',
                'author' => 'Stephen R. Covey',
                'price' => 120000,
                'quantity' => 12,
                'description' => 'Các thói quen giúp nâng cao hiệu quả cá nhân.',
                'image' => null,
            ],
            [
                'category_id' => $congNghe,
                'title' => 'Lập Trình Python Cơ Bản',
                'author' => 'Nguyễn Văn A',
                'price' => 95000,
                'quantity' => 20,
                'description' => 'Giáo trình nhập môn lập trình Python.',
                'image' => null,
            ],
            [
                'category_id' => $congNghe,
                'title' => 'Học PHP Và MySQL',
                'author' => 'Nguyễn Văn B',
                'price' => 105000,
                'quantity' => 10,
                'description' => 'Kiến thức cơ bản về PHP và cơ sở dữ liệu MySQL.',
                'image' => null,
            ],
            [
                'category_id' => $ngoaiNgu,
                'title' => 'English Grammar in Use',
                'author' => 'Raymond Murphy',
                'price' => 180000,
                'quantity' => 15,
                'description' => 'Tài liệu học ngữ pháp tiếng Anh.',
                'image' => null,
            ],
        ];

        foreach ($books as $book) {
            DB::table('books')->updateOrInsert(
                ['title' => $book['title']],
                $book
            );
        }
    }
}
