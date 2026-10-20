<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $vanHocThieuNhi = DB::table('categories')
            ->where('name', 'Văn học thiếu nhi')
            ->value('id');

        $vanHocHienDai = DB::table('categories')
            ->where('name', 'Văn học hiện đại')
            ->value('id');

        $trinhTham = DB::table('categories')
            ->where('name', 'Trinh thám – Kinh dị')
            ->value('id');

        $phieuLuu = DB::table('categories')
            ->where('name', 'Phiêu lưu – Ly kỳ')
            ->value('id');

        $langMan = DB::table('categories')
            ->where('name', 'Lãng mạn')
            ->value('id');

        $books = [
            [
                'category_id' => $vanHocThieuNhi,
                'title' => 'KHU VƯỜN BÍ MẬT',
                'author' => 'Frances Hodgson Burnett',
                'price' => 99000,
                'quantity' => 20,
                'description' => 'Câu chuyện về một khu vườn bí mật và hành trình trưởng thành của những đứa trẻ.',
                'image' => 'khuvuonbimat.webp',
            ],
            [
                'category_id' => $vanHocThieuNhi,
                'title' => 'NHỮNG VÌ SAO',
                'author' => 'Chưa cập nhật',
                'price' => 85000,
                'quantity' => 15,
                'description' => 'Một tác phẩm trong danh mục văn học thiếu nhi.',
                'image' => 'nhung-vi-sao.webp',
            ],
            [
                'category_id' => $vanHocThieuNhi,
                'title' => 'ANH CHÀNG KHÔNG GIAN',
                'author' => 'Chưa cập nhật',
                'price' => 95000,
                'quantity' => 20,
                'description' => 'Câu chuyện phiêu lưu dành cho độc giả trẻ.',
                'image' => 'anh-chang-khong-gian.webp',
            ],
            [
                'category_id' => $vanHocHienDai,
                'title' => 'BỮA TỐI',
                'author' => 'Chưa cập nhật',
                'price' => 89000,
                'quantity' => 18,
                'description' => 'Một tác phẩm thuộc danh mục văn học hiện đại.',
                'image' => 'bua-toi.webp',
            ],
            [
                'category_id' => $vanHocHienDai,
                'title' => 'THIÊN ĐƯỜNG',
                'author' => 'Chưa cập nhật',
                'price' => 95000,
                'quantity' => 12,
                'description' => 'Một tác phẩm văn học dành cho độc giả yêu thích khám phá những câu chuyện mới.',
                'image' => 'thien-duong.webp',
            ],
            [
                'category_id' => $vanHocHienDai,
                'title' => 'KHÔNG TỪ BIỆT',
                'author' => 'Chưa cập nhật',
                'price' => 99000,
                'quantity' => 16,
                'description' => 'Một câu chuyện về tình cảm và những lựa chọn trong cuộc sống.',
                'image' => 'khong-tu-biet.webp',
            ],
            [
                'category_id' => $trinhTham,
                'title' => 'LỜI NGUYỀN CỦA THÁM TỬ LỪNG DANH',
                'author' => 'Chưa cập nhật',
                'price' => 125000,
                'quantity' => 15,
                'description' => 'Một vụ án bí ẩn mở ra hành trình truy tìm sự thật.',
                'image' => 'diem-go.webp',
            ],
            [
                'category_id' => $trinhTham,
                'title' => 'PHÍA SAU NGHI CAN X',
                'author' => 'Keigo Higashino',
                'price' => 110000,
                'quantity' => 18,
                'description' => 'Một vụ án phức tạp với những bí mật và nút thắt bất ngờ.',
                'image' => 'x.webp',
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