<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Créer la table addresses (indépendante)
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('location');
            $table->tinyInteger('deleted')->default(0);
            $table->timestamps();
        });

        // 2. Créer la table images (polymorphique)
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->morphs('imageable');
            $table->tinyInteger('deleted')->default(0);
            $table->timestamps();
        });

        // 3. Modifier la table users
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('owns')->default(false)->after('password');
            $table->boolean('follows')->default(false)->after('owns');
            $table->tinyInteger('deleted')->default(0)->after('follows');
        });

        // 4. Modifier la table categories
        Schema::table('categories', function (Blueprint $table) {
            $table->string('icon_cat')->nullable()->after('description');
        });

        // 5. Modifier la table shops
        Schema::table('shops', function (Blueprint $table) {
            $table->string('logo_url')->nullable()->after('phone');
            $table->boolean('is_active')->default(true)->after('logo_url');
            $table->text('return_policy')->nullable()->after('is_active');
            $table->string('contact_email')->nullable()->after('return_policy');
            $table->string('contact_phone')->nullable()->after('contact_email');
            $table->string('location')->nullable()->after('address');
            $table->decimal('average_rating', 3, 2)->default(0)->after('contact_phone');
            $table->integer('reviews_count')->default(0)->after('average_rating');
            $table->unsignedBigInteger('main_category_id')->nullable()->after('reviews_count');
            $table->string('website_url')->nullable()->after('main_category_id');
            
            $table->foreign('main_category_id')->references('id')->on('categories')->onDelete('set null');
        });

        // 6. Créer la table shop_followers (relation User-Shop)
        Schema::create('shop_followers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('shop_id');
            $table->string('reason')->nullable();
            $table->tinyInteger('deleted')->default(0);
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
        });

        // 7. Modifier la table products
        Schema::table('products', function (Blueprint $table) {
            $table->string('file_url')->nullable()->after('description');
            $table->boolean('is_on_sale')->default(false)->after('stock');
            $table->decimal('sale_price', 10, 2)->nullable()->after('is_on_sale');
            $table->date('sale_end_date')->nullable()->after('sale_price');
            $table->integer('popularity_score')->default(0)->after('sale_end_date');
            $table->integer('carousel_priority')->default(0)->after('popularity_score');
            $table->boolean('auto_display')->default(true)->after('carousel_priority');
            $table->boolean('manual_display')->default(false)->after('auto_display');
            $table->string('target_segment')->nullable()->after('manual_display');
            $table->decimal('exclusive_discount', 5, 2)->nullable()->after('target_segment');
            $table->tinyInteger('status')->default(1)->after('deleted');
        });

        // 8. Créer la table product_category (pivot products-categories)
        Schema::create('product_category', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('category_id');
            $table->tinyInteger('deleted')->default(0);
            $table->timestamps();
            
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });

        // 9. Créer la table producting (semble être une table de production/fabrication)
        Schema::create('productings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->tinyInteger('deleted')->default(0);
            $table->timestamps();
        });

        // 10. Créer la table types (pour Order)
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('label')->nullable();
            $table->tinyInteger('deleted')->default(0);
            $table->timestamps();
        });

        // 11. Modifier la table orders
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('type_id')->nullable()->after('shop_id');
            $table->integer('quantity')->default(1)->change();
            
            $table->foreign('type_id')->references('id')->on('types')->onDelete('set null');
        });

        // 12. Créer la table blogs
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('slug_url')->unique();
            $table->string('title');
            $table->text('description')->nullable();
            $table->longText('content');
            $table->date('publication_date');
            $table->string('reading_time')->nullable();
            $table->boolean('is_published')->default(false);
            $table->integer('views_count')->default(0);
            $table->integer('shares_count')->default(0);
            $table->string('quote')->nullable();
            $table->string('quote_author')->nullable();
            $table->text('product_features')->nullable();
            $table->string('product_status')->nullable();
            $table->tinyInteger('deleted')->default(0);
            $table->timestamps();
        });

        // 13. Créer la table blog_images (pivot Blog-Image)
        Schema::create('blog_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blog_id');
            $table->unsignedBigInteger('image_id');
            $table->tinyInteger('deleted')->default(0);
            $table->timestamps();
            
            $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade');
            $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');
        });

        // 14. Créer la table reviews (polymorphique)
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('rating');
            $table->text('comment')->nullable();
            $table->date('end_date')->nullable();
            $table->morphs('reviewable');
            $table->unsignedBigInteger('user_id');
            $table->tinyInteger('deleted')->default(0);
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        // 15. Créer la table review_images (pivot Review-Image)
        Schema::create('review_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('review_id');
            $table->unsignedBigInteger('image_id');
            $table->tinyInteger('deleted')->default(0);
            $table->timestamps();
            
            $table->foreign('review_id')->references('id')->on('reviews')->onDelete('cascade');
            $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');
        });

        // 16. Créer la table review_votes
        Schema::create('review_votes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('review_id');
            $table->unsignedBigInteger('user_id');
            $table->string('reason')->nullable();
            $table->enum('type', ['LIKE', 'DISLIKE', 'REPORT'])->default('LIKE');
            $table->enum('status', ['PENDING', 'APPROVED', 'REJECTED'])->default('PENDING');
            $table->tinyInteger('deleted')->default(0);
            $table->timestamps();
            
            $table->foreign('review_id')->references('id')->on('reviews')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        // 17. Créer la table notifications
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('firstname')->nullable();
            $table->string('company')->nullable();
            $table->string('title');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->text('comment')->nullable();
            $table->tinyInteger('deleted')->default(0);
            $table->timestamps();
        });

        // 18. Modifier services (ajouter deleted s'il n'existe pas)
        if (!Schema::hasColumn('services', 'deleted')) {
            Schema::table('services', function (Blueprint $table) {
                $table->tinyInteger('deleted')->default(0)->after('price');
            });
        }

        // 19. Modifier rentals (ajouter deleted s'il n'existe pas)
        if (!Schema::hasColumn('rentals', 'deleted')) {
            Schema::table('rentals', function (Blueprint $table) {
                $table->tinyInteger('deleted')->default(0)->after('available');
            });
        }

        // 20. Supprimer les anciennes tables obsolètes
        Schema::dropIfExists('comments');
        Schema::dropIfExists('ratings');
    }

    public function down(): void
    {
        Schema::dropIfExists('review_votes');
        Schema::dropIfExists('review_images');
        Schema::dropIfExists('reviews');
        Schema::dropIfExists('blog_images');
        Schema::dropIfExists('blogs');
        
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['type_id']);
            $table->dropColumn('type_id');
        });
        
        Schema::dropIfExists('types');
        Schema::dropIfExists('productings');
        Schema::dropIfExists('product_category');
        
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'file_url', 'is_on_sale', 'sale_price', 'sale_end_date',
                'popularity_score', 'carousel_priority', 'auto_display',
                'manual_display', 'target_segment', 'exclusive_discount', 'status'
            ]);
        });
        
        Schema::dropIfExists('shop_followers');
        
        Schema::table('shops', function (Blueprint $table) {
            $table->dropForeign(['main_category_id']);
            $table->dropColumn([
                'logo_url', 'is_active', 'return_policy', 'contact_email',
                'contact_phone', 'location', 'average_rating', 'reviews_count',
                'main_category_id', 'website_url'
            ]);
        });
        
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('icon_cat');
        });
        
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['owns', 'follows', 'deleted']);
        });
        
        Schema::dropIfExists('images');
        Schema::dropIfExists('addresses');
        Schema::dropIfExists('notifications');
        
        // Recréer les anciennes tables
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('shop_id');
            $table->text('content');
            $table->tinyInteger('deleted')->default(0);
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
        });

        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('shop_id')->nullable();
            $table->integer('rating')->default(0);
            $table->text('comment')->nullable();
            $table->tinyInteger('deleted')->default(0);
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
        });
    }
};