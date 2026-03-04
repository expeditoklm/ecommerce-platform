<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            ALTER TABLE products 
            MODIFY COLUMN exchange_status 
            ENUM('En Echange', 'Echange Terminé', 'Indisponible') 
            DEFAULT 'En Echange'
        ");
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE products 
            MODIFY COLUMN exchange_status 
            VARCHAR(50) DEFAULT 'En Echange'
        ");
    }
};