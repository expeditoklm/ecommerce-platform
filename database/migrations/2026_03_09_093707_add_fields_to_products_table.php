<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {

            // Section principale : produit, service ou location
            $table->enum('section', ['product', 'service', 'rental'])
                  ->default('product')
                  ->after('uuid');

            // Prix spécifiques aux services et locations
            $table->decimal('price_7days', 10, 2)->nullable()->after('price');
            $table->decimal('price_30days', 10, 2)->nullable()->after('price_7days');

            // Wishlist count (liste d'attente)
            $table->integer('wishlist_count')->default(0)->after('popularity_score');

            // Label affiché (Nouveau, En échange, etc.)
            $table->enum('label', ['new', 'exchange', 'none'])->default('new')->after('section');
        });

        // Changer exchange_status en enum complet
        DB::statement("
            ALTER TABLE products
            MODIFY COLUMN exchange_status
            ENUM('En Echange', 'Echange Terminé', 'Indisponible', 'En Location', 'Service Disponible', 'Service Indisponible')
            DEFAULT 'En Echange'
        ");
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'section',
                'price_7days',
                'price_30days',
                'wishlist_count',
                'label',
            ]);
        });

        DB::statement("
            ALTER TABLE products
            MODIFY COLUMN exchange_status VARCHAR(50) DEFAULT 'En Echange'
        ");
    }
};