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
        // Tables principales
        $tables = [
            'addresses',
            'blogs',
            'blog_images',
            'categories',
            'category_product',
            'notifications',
            'orders',
            'productings',
            'products',
            'product_images',
            'reviews',
            'review_images',
            'review_vote_or_signalment',
            'shops',
            'shop_followers',
            'types',
            'users',
        ];

        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->uuid('uuid')->unique()->after('id');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tables = [
            'addresses',
            'blogs',
            'blog_images',
            'categories',
            'category_product',
            'notifications',
            'orders',
            'productings',
            'products',
            'product_images',
            'reviews',
            'review_images',
            'review_vote_or_signalment',
            'shops',
            'shop_followers',
            'types',
            'users',
        ];

        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->dropColumn('uuid');
            });
        }
    }
};