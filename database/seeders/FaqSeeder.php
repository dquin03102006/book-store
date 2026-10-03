<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('faqs')->updateOrInsert(
            ['question' => 'Làm sao để đặt sách?'],
            [
                'answer' => 'Bạn chọn sách, thêm vào giỏ hàng và tiến hành thanh toán.',
                'is_active' => true,
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );

        DB::table('faqs')->updateOrInsert(
            ['question' => 'Có thể thanh toán bằng hình thức nào?'],
            [
                'answer' => 'Hiện tại website hỗ trợ thanh toán khi nhận hàng (COD).',
                'is_active' => true,
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );

        DB::table('faqs')->updateOrInsert(
            ['question' => 'Thời gian giao hàng bao lâu?'],
            [
                'answer' => 'Thời gian giao hàng tùy thuộc vào khu vực nhận hàng.',
                'is_active' => true,
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );

        DB::table('faqs')->updateOrInsert(
            ['question' => 'Có được đổi trả sách không?'],
            [
                'answer' => 'Sách có thể được hỗ trợ đổi trả nếu đáp ứng điều kiện của cửa hàng.',
                'is_active' => true,
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );
    }
}
