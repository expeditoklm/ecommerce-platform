<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Photo de profil de l'utilisateur (affichée dans les reviews)
            $table->string('avatar_url')->nullable()->after('email');

            // Prénom (optionnel, utile pour l'affichage dans les reviews)
            $table->string('firstname')->nullable()->after('name');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['avatar_url', 'firstname']);
        });
    }
};