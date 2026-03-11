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
            // Đổi tên product_category_id thành category_id
            $table->renameColumn('product_category_id', 'category_id');

            // Xóa các cột string cũ (nếu tồn tại)
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
            // Đổi tên ngược lại
            $table->renameColumn('category_id', 'product_category_id');

            // Khôi phục cột cũ
            $table->string('brand')->default('Gem Smart Lock');
            $table->string('category');
        });
    }
};
