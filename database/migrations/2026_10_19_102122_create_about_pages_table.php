<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_pages', function (Blueprint $table) {
            $table->id();
            $table->string('hero_label')->default('VỀ TIỆM SÁCH NHỎ');
            $table->string('hero_title')->default('Một cuốn sách hay, một góc nhỏ, một cảm hứng mới.');
            $table->text('hero_description')->nullable();
            $table->string('hero_image')->nullable();

            $table->string('story_label')->default('CÂU CHUYỆN CỦA CHÚNG TÔI');
            $table->string('story_title')->default('Không chỉ là nơi bán sách');
            $table->text('story_content')->nullable();

            $table->string('values_label')->default('GIÁ TRỊ CỦA TIỆM');
            $table->string('values_title')->default('Những điều chúng tôi hướng đến');
            $table->text('values_description')->nullable();

            $table->string('value1_title')->default('Đa dạng lựa chọn');
            $table->text('value1_content')->nullable();
            $table->string('value2_title')->default('Dễ dàng tìm kiếm');
            $table->text('value2_content')->nullable();
            $table->string('value3_title')->default('Trải nghiệm thân thiện');
            $table->text('value3_content')->nullable();

            $table->string('section_image')->nullable();

            $table->string('info1_label')->default('ĐỐI TƯỢNG');
            $table->string('info1_value')->default('Người yêu sách');
            $table->string('info2_label')->default('THỂ LOẠI');
            $table->string('info2_value')->default('Đa dạng');
            $table->string('info3_label')->default('TRẢI NGHIỆM');
            $table->string('info3_value')->default('Đơn giản & thuận tiện');
            $table->string('info4_label')->default('ĐỊNH HƯỚNG');
            $table->string('info4_value')->default('Gần gũi & tin cậy');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_pages');
    }
};