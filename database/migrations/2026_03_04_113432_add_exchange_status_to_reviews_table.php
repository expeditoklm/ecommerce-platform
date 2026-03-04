<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            // Statut de l'échange suite à la review
            // Valeurs possibles : 'Echange avec succes', 'Echange échoué'
            $table->string('exchange_status', 50)
                  ->nullable()
                  ->after('comment');
            // Enum si tu veux être strict :
            // $table->enum('exchange_status', ['Echange avec succes', 'Echange échoué'])->nullable()->after('comment');
        });
    }

    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropColumn('exchange_status');
        });
    }
};