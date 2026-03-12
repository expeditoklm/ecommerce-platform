<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            if (!Schema::hasColumn('blogs', 'content_left')) {
                $table->text('content_left')->nullable()->after('content');
            }
            if (!Schema::hasColumn('blogs', 'content_right')) {
                $table->text('content_right')->nullable()->after('content_left');
            }
        });
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn(['content_left', 'content_right']);
        });
    }
};