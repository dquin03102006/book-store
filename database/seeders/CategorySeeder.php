<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->updateOrInsert(
            ['name' => 'Văn học'],
            ['description' => 'Các tác phẩm văn học trong và ngoài nước.']
        );

        DB::table('categories')->updateOrInsert(
            ['name' => 'Kinh tế'],
            ['description' => 'Sách về kinh doanh, tài chính và kinh tế.']
        );

        DB::table('categories')->updateOrInsert(
            ['name' => 'Kỹ năng sống'],
            ['description' => 'Sách phát triển bản thân và kỹ năng sống.']
        );

        DB::table('categories')->updateOrInsert(
            ['name' => 'Công nghệ'],
            ['description' => 'Sách về công nghệ, lập trình và kỹ thuật.']
        );

        DB::table('categories')->updateOrInsert(
            ['name' => 'Ngoại ngữ'],
            ['description' => 'Sách học tiếng Anh và các ngoại ngữ khác.']
        );
    }
}
