<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {

            // Produit demandé (celui de la boutique)
            // product_id existant = produit cible (celui qu'on veut)

            // Produit proposé en échange (celui du demandeur)
            $table->foreignId('offered_product_id')
                  ->nullable()
                  ->after('product_id')
                  ->constrained('products')
                  ->onDelete('set null');

            // Type de transaction
            $table->enum('type', ['exchange', 'service', 'rental'])
                  ->default('exchange')
                  ->after('uuid');

            // Pour les locations : dates
            $table->date('rental_start_date')->nullable()->after('total');
            $table->date('rental_end_date')->nullable()->after('rental_start_date');
            $table->integer('rental_days')->nullable()->after('rental_end_date');

            // Message du demandeur
            $table->text('message')->nullable()->after('rental_days');

            // Raison du refus
            $table->text('rejection_reason')->nullable()->after('message');

            // Propriétaire de la boutique (receveur)
            $table->foreignId('owner_id')
                  ->nullable()
                  ->after('user_id')
                  ->constrained('users')
                  ->onDelete('set null');
        });

        // Mettre à jour le status avec plus d'options
        DB::statement("
            ALTER TABLE orders
            MODIFY COLUMN status ENUM(
                'pending',
                'accepted',
                'rejected',
                'completed',
                'cancelled',
                'counter_offer'
            ) NOT NULL DEFAULT 'pending'
        ");
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['offered_product_id']);
            $table->dropForeign(['owner_id']);
            $table->dropColumn([
                'offered_product_id', 'type',
                'rental_start_date', 'rental_end_date', 'rental_days',
                'message', 'rejection_reason', 'owner_id',
            ]);
        });

        DB::statement("
            ALTER TABLE orders
            MODIFY COLUMN status VARCHAR(255) NOT NULL DEFAULT 'pending'
        ");
    }
};