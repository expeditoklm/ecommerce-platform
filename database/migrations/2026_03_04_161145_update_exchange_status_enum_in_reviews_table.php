<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            ALTER TABLE reviews 
            MODIFY COLUMN exchange_status 
            ENUM('Echange avec succes', 'Echange échoué') 
            DEFAULT NULL
        ");
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE reviews 
            MODIFY COLUMN exchange_status 
            VARCHAR(50) DEFAULT NULL
        ");
    }
};