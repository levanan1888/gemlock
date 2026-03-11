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
            // Thêm brand_id nếu chưa tồn tại (tránh lỗi khi cột đã được tạo trước đó)
            if (! Schema::hasColumn('products', 'brand_id')) {
                $table->foreignId('brand_id')
                    ->nullable()
                    ->constrained('brands')
                    ->onDelete('set null')
                    ->after('name');
            }

            // Thêm category_id nếu chưa tồn tại
            if (! Schema::hasColumn('products', 'category_id')) {
                $table->foreignId('category_id')
                    ->nullable()
                    ->constrained('product_categories')
                    ->onDelete('set null')
                    ->after('brand_id');
            }

            // Xóa các cột string cũ
            if (Schema::hasColumn('products', 'brand')) {
                $table->dropColumn('brand');
            }
            if (Schema::hasColumn('products', 'category')) {
                $table->dropColumn('category');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Xóa foreign keys
            $table->dropForeign(['brand_id']);
            $table->dropForeign(['category_id']);
            $table->dropColumn('brand_id');
            $table->dropColumn('category_id');

            // Khôi phục cột cũ
            $table->string('brand')->default('Gem Smart Lock');
            $table->string('category');
        });
    }
};
