<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Champs manquants sur blogs
        Schema::table('blogs', function (Blueprint $table) {
            if (!Schema::hasColumn('blogs', 'cover_url')) {
                $table->string('cover_url')->nullable()->after('content');
            }
        });

        // Role + position sur blog_images
        Schema::table('blog_images', function (Blueprint $table) {
            if (!Schema::hasColumn('blog_images', 'role')) {
                $table->enum('role', ['cover', 'left', 'right', 'inline'])
                      ->default('inline')->after('url');
            }
            if (!Schema::hasColumn('blog_images', 'position')) {
                $table->integer('position')->default(0)->after('role');
            }
        });

        // Pivot blog ↔ category (remplace blog_tags)
        if (!Schema::hasTable('blog_category')) {
            Schema::create('blog_category', function (Blueprint $table) {
                $table->id();
                $table->foreignId('blog_id')
                      ->constrained('blogs')
                      ->cascadeOnDelete();
                $table->foreignId('category_id')
                      ->constrained('categories')
                      ->cascadeOnDelete();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('blog_category');

        Schema::table('blog_images', function (Blueprint $table) {
            if (Schema::hasColumn('blog_images', 'role')) {
                $table->dropColumn('role');
            }
            if (Schema::hasColumn('blog_images', 'position')) {
                $table->dropColumn('position');
            }
        });

        Schema::table('blogs', function (Blueprint $table) {
            if (Schema::hasColumn('blogs', 'cover_url')) {
                $table->dropColumn('cover_url');
            }
        });
    }
};