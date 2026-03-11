<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Thêm image_id cho ảnh đại diện
            $table->foreignId('image_id')
                ->nullable()
                ->constrained('media')
                ->onDelete('set null')
                ->after('image');
            
            // Xóa cột cũ
            $table->dropColumn('image');
            $table->dropColumn('images');
        });

        // Tạo bảng trung gian cho gallery
        Schema::create('media_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('media_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('product_id')
                ->constrained()
                ->onDelete('cascade');
            $table->integer('order')->default(0);
            $table->timestamps();

            $table->unique(['media_id', 'product_id']);
            $table->index('product_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_product');

        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['image_id']);
            $table->dropColumn('image_id');

            // Khôi phục cột cũ
            $table->string('image')->nullable()->after('description');
            $table->json('images')->nullable()->after('image');
        });
    }
};
