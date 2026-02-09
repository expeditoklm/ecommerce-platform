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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->nullable()->constrained('products')->onDelete('set null');
            $table->foreignId('service_id')->nullable()->constrained('services')->onDelete('set null');
            $table->foreignId('rental_id')->nullable()->constrained('rentals')->onDelete('set null');
            $table->foreignId('shop_id')->nullable()->constrained('shops')->onDelete('set null');
            $table->integer('quantity')->default(1);
            $table->decimal('total', 12, 2)->default(0);
            $table->string('status')->default('pending');
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
