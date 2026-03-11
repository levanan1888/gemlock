<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Xóa bảng curator nếu tồn tại (bảng sai)
        Schema::dropIfExists('curator');

        // Kiểm tra nếu bảng media chưa tồn tại thì tạo
        // Lưu ý: Curator sẽ tự tạo bảng này khi chạy migrate
        // Nhưng nếu có vấn đề, có thể cần chạy lại: php artisan curator:install
    }

    public function down(): void
    {
        // Không cần làm gì trong trường hợp ngược lại
    }
};
