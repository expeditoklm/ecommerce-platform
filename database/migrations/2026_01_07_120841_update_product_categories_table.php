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
        Schema::table('category_product', function (Blueprint $table) {
            // Ajout du champ deleted (booléen ou tinyint)
            $table->boolean('deleted')->default(false)->after('product_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('category_product', function (Blueprint $table) {
            $table->dropColumn('deleted');
        });
    }
};