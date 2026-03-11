<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('product_categories', function (Blueprint $table) {
            $table->string('icon')->nullable()->after('slug');
            $table->string('image')->nullable()->after('icon');
            $table->string('series')->nullable()->after('image');
            $table->string('title')->nullable()->after('series');
            $table->json('features')->nullable()->after('title');
            $table->integer('order')->default(0)->after('features');
        });
    }

    public function down(): void
    {
        Schema::table('product_categories', function (Blueprint $table) {
            $table->dropColumn(['icon', 'image', 'series', 'title', 'features', 'order']);
        });
    }
};
