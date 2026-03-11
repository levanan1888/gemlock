<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Xóa foreign key image_id cũ trỏ tới media
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['image_id']);
            $table->dropColumn('image_id');
        });

        // 2. Xóa bảng trung gian media_product
        Schema::dropIfExists('media_product');

        // 3. Xóa bảng media
        Schema::dropIfExists('media');

        // 4. Thêm lại image_id trỏ tới curator
        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('image_id')
                ->nullable()
                ->constrained('curator')
                ->onDelete('set null')
                ->after('description');
        });
    }

    public function down(): void
    {
        // Tạo lại bảng media
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('page_type')->nullable();
            $table->string('name');
            $table->string('file_path');
            $table->string('file_type')->nullable();
            $table->string('mime_type')->nullable();
            $table->integer('file_size')->nullable();
            $table->text('description')->nullable();
            $table->string('alt_text')->nullable();
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
            $table->timestamps();
            $table->index('page_type');
        });

        // Tạo lại bảng trung gian
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

        // Đổi foreign key trở về media
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['image_id']);
            $table->dropColumn('image_id');
            $table->foreignId('image_id')
                ->nullable()
                ->constrained('media')
                ->onDelete('set null')
                ->after('description');
        });
    }
};
