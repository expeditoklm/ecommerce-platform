<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Code unique du produit (ex: FBB00255)
            $table->string('code', 50)->nullable()->unique()->after('uuid');

            // Date de mise en ligne (différente de created_at)
            $table->date('online_date')->nullable()->after('code');

            // Adresse/localisation spécifique au produit (Ville, Quartier)
            $table->string('city', 100)->nullable()->after('online_date');
            $table->string('district', 100)->nullable()->after('city');

            // Statut lisible (En Echange, Vendu, Disponible, etc.)
            // Remplace le tinyint 'status' existant par un varchar plus expressif
            $table->string('exchange_status', 50)->nullable()->default('En Echange')->after('district');
            // Valeurs possibles : 'En Echange', 'Echange Terminé', 'Indisponible'
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['code', 'online_date', 'city', 'district', 'exchange_status']);
        });
    }
};