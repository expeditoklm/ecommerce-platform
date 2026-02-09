@echo off
php artisan krlove:generate:model Shop --table-name=shops
php artisan krlove:generate:model Product --table-name=products
php artisan krlove:generate:model Category --table-name=categories
php artisan krlove:generate:model Order --table-name=orders
php artisan krlove:generate:model User --table-name=users
php artisan krlove:generate:model Blog --table-name=blogs
php artisan krlove:generate:model Review --table-name=reviews
php artisan krlove:generate:model Type --table-name=types
php artisan krlove:generate:model Address --table-name=addresses
php artisan krlove:generate:model Notification --table-name=notifications
php artisan krlove:generate:model ProductImage --table-name=product_images
php artisan krlove:generate:model BlogImage --table-name=blog_images
php artisan krlove:generate:model ReviewImage --table-name=review_images
php artisan krlove:generate:model ReviewVoteOrSignalment --table-name=review_vote_or_signalment
php artisan krlove:generate:model ShopFollower --table-name=shop_followers
php artisan krlove:generate:model Producting --table-name=productings
echo Tous les modeles ont ete generes!
pause