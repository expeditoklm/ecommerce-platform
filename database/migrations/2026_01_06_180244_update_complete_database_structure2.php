<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. D'ABORD supprimer les contraintes de clés étrangères dans orders
        if (Schema::hasTable('orders')) {
            Schema::table('orders', function (Blueprint $table) {
                // Supprimer les clés étrangères et colonnes si elles existent
                if (Schema::hasColumn('orders', 'service_id')) {
                    try {
                        $table->dropForeign(['service_id']);
                    } catch (\Exception $e) {
                        // La contrainte n'existe pas, on continue
                    }
                    $table->dropColumn('service_id');
                }
                if (Schema::hasColumn('orders', 'rental_id')) {
                    try {
                        $table->dropForeign(['rental_id']);
                    } catch (\Exception $e) {
                        // La contrainte n'existe pas, on continue
                    }
                    $table->dropColumn('rental_id');
                }
                if (Schema::hasColumn('orders', 'shop_id')) {
                    try {
                        $table->dropForeign(['shop_id']);
                    } catch (\Exception $e) {
                        // La contrainte n'existe pas, on continue
                    }
                    $table->dropColumn('shop_id');
                }
                if (Schema::hasColumn('orders', 'type_id')) {
                    try {
                        $table->dropForeign(['type_id']);
                    } catch (\Exception $e) {
                        // La contrainte n'existe pas, on continue
                    }
                    $table->dropColumn('type_id');
                }
            });
        }

        // 2. MAINTENANT on peut supprimer les tables services et rentals
        Schema::dropIfExists('services');
        Schema::dropIfExists('rentals');

        // 3. Supprimer d'ABORD blog_images qui référence images
        Schema::dropIfExists('blog_images');
        
        // 4. Supprimer review_images qui référence aussi images
        Schema::dropIfExists('review_images');

        // 5. MAINTENANT on peut supprimer la table images (polymorphique)
        Schema::dropIfExists('images');

        // 6. Modifier la table addresses - Ajouter clé étrangère shop_id
        Schema::table('addresses', function (Blueprint $table) {
            $table->unsignedBigInteger('shop_id')->nullable()->after('location');
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
        });

        // 5. Modifier la table blogs - Ajouter shop_id et category_id
        Schema::table('blogs', function (Blueprint $table) {
            $table->unsignedBigInteger('shop_id')->nullable()->after('id');
            $table->unsignedBigInteger('category_id')->nullable()->after('shop_id');
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });

        // 6. Supprimer la table blog_images et la recréer sans image_id
        Schema::dropIfExists('blog_images');
        Schema::create('blog_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blog_id');
            $table->string('url');
            $table->tinyInteger('deleted')->default(0);
            $table->timestamps();
            
            $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade');
        });

        // 7. Créer la table product_images
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('url');
            $table->tinyInteger('deleted')->default(0);
            $table->timestamps();
            
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });

        // 10. Modifier la table notifications - Ajouter shop_id
        Schema::table('notifications', function (Blueprint $table) {
            $table->unsignedBigInteger('shop_id')->nullable()->after('id');
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
        });

        // 11. Modifier la table products - Garder shop_id et type_id, supprimer category_id
        Schema::table('products', function (Blueprint $table) {
            // Supprimer la clé étrangère category_id
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
            
            // Ajouter type_id si elle n'existe pas
            if (!Schema::hasColumn('products', 'type_id')) {
                $table->unsignedBigInteger('type_id')->nullable()->after('shop_id');
                $table->foreign('type_id')->references('id')->on('types')->onDelete('set null');
            }
        });

        // 12. Supprimer la table product_category (plus nécessaire)
        Schema::dropIfExists('product_category');

        // 13. Modifier la table reviews - Supprimer morphTo et ajouter product_id
        Schema::table('reviews', function (Blueprint $table) {
            // Supprimer les colonnes polymorphiques
            $table->dropColumn(['reviewable_id', 'reviewable_type']);
            
            // Ajouter product_id
            $table->unsignedBigInteger('product_id')->after('end_date');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });

        // 14. MAINTENANT recréer review_images sans image_id
        Schema::create('review_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('review_id');
            $table->string('url');
            $table->tinyInteger('deleted')->default(0);
            $table->timestamps();
            
            $table->foreign('review_id')->references('id')->on('reviews')->onDelete('cascade');
        });

        // 15. Renommer review_votes en review_vote_or_signalment
        Schema::rename('review_votes', 'review_vote_or_signalment');
    }

    public function down(): void
    {
        // Ordre inversé pour le rollback
        
        // 13. Renommer review_vote_or_signalment en review_votes
        Schema::rename('review_vote_or_signalment', 'review_votes');

        // 12. Recréer review_images avec image_id
        Schema::dropIfExists('review_images');
        Schema::create('review_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('review_id');
            $table->unsignedBigInteger('image_id');
            $table->tinyInteger('deleted')->default(0);
            $table->timestamps();
            
            $table->foreign('review_id')->references('id')->on('reviews')->onDelete('cascade');
        });

        // 13. Restaurer les colonnes polymorphiques dans reviews
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropColumn('product_id');
            $table->morphs('reviewable');
        });

        // 12. Recréer product_category
        Schema::create('product_category', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('category_id');
            $table->tinyInteger('deleted')->default(0);
            $table->timestamps();
            
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });

        // 11. Restaurer category_id dans products
        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasColumn('products', 'type_id')) {
                $table->dropForeign(['type_id']);
                $table->dropColumn('type_id');
            }
            
            $table->unsignedBigInteger('category_id')->nullable()->after('shop_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });

        // 10. Supprimer shop_id de notifications
        Schema::table('notifications', function (Blueprint $table) {
            $table->dropForeign(['shop_id']);
            $table->dropColumn('shop_id');
        });

        // 9. Supprimer product_images
        Schema::dropIfExists('product_images');

        // 8. Supprimer blog_images
        Schema::dropIfExists('blog_images');

        // 7. Supprimer shop_id et category_id de blogs
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropForeign(['shop_id']);
            $table->dropForeign(['category_id']);
            $table->dropColumn(['shop_id', 'category_id']);
        });

        // 4. Supprimer shop_id de addresses
        Schema::table('addresses', function (Blueprint $table) {
            $table->dropForeign(['shop_id']);
            $table->dropColumn('shop_id');
        });

        // 3. Recréer la table images
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->morphs('imageable');
            $table->tinyInteger('deleted')->default(0);
            $table->timestamps();
        });

        // 2. Recréer services et rentals
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shop_id');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2)->default(0);
            $table->tinyInteger('deleted')->default(0);
            $table->timestamps();
            
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });

        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shop_id');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->decimal('price_per_day', 10, 2)->default(0);
            $table->boolean('available')->default(true);
            $table->tinyInteger('deleted')->default(0);
            $table->timestamps();
            
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });

        // 1. Restaurer les colonnes dans orders
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('service_id')->nullable();
            $table->unsignedBigInteger('rental_id')->nullable();
            $table->unsignedBigInteger('shop_id')->nullable();
            $table->unsignedBigInteger('type_id')->nullable();
            
            $table->foreign('service_id')->references('id')->on('services')->onDelete('set null');
            $table->foreign('rental_id')->references('id')->on('rentals')->onDelete('set null');
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('set null');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('set null');
        });
    }
};