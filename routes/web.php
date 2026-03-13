<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



use App\Http\Controllers\ShopController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExchangeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ShopController::class, 'welcome'])->name('welcome');
//Route::get('/', function () {
//   return view('welcome');
// });

Route::get('/admin/index', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/search', [ShopController::class, 'search'])->name('search');
Route::get('/shop/category/{uuid}', [ShopController::class, 'shopByCategory'])
    ->name('shop.by-category');


    Route::get('/location/set',   [ShopController::class, 'setLocation'])->name('location.set');
Route::get('/location/clear', [ShopController::class, 'clearLocation'])->name('location.clear');


Route::get('/base', [ShopController::class, 'base'])->name('base');

Route::get('/shop/wishlist', [ShopController::class, 'shopWishlist'])
    ->middleware('auth')
    ->name('shop.wishlist');

Route::post('/wishlist/toggle/{uuid}', [ShopController::class, 'toggleWishlist'])
    ->middleware('auth')
    ->name('wishlist.toggle');
Route::get('/shop/cart', [ShopController::class, 'shopCart'])->name('shop.cart');

// Modifiez votre route pour accepter l'UUID
Route::get('/shop/product/{uuid}', [ShopController::class, 'shopSingle'])
    ->name('shop.single');

Route::get('/shop/single-service', [ShopController::class, 'shopSingleService'])->name('shop.single-service');
Route::get('/shop/single-location', [ShopController::class, 'shopSingleLocation'])->name('shop.single-location');

Route::get('/shop/fullwidth', [ShopController::class, 'shopFullwidth'])->name('shop.fullwidth');
Route::get('/shop/checkout', [ShopController::class, 'shopCheckout'])->name('shop.checkout');

Route::get('/shop/select-product', [ShopController::class, 'shopSelectProduct'])->name('shop.select-product');
Route::get('/shop/select-service', [ShopController::class, 'shopSelectService'])->name('shop.select-service');
Route::get('/shop/select-location', [ShopController::class, 'shopSelectLocation'])->name('shop.select-location');

Route::get('/shop/view-all-products', [ShopController::class, 'viewAllProducts'])->name('view.all.products');
Route::get('/shop/view-all-services', [ShopController::class, 'viewAllServices'])->name('view.all.services');
Route::get('/shop/view-all-locations', [ShopController::class, 'viewAllLocations'])->name('view.all.locations');
Route::get('/shop/choice-away', [ShopController::class, 'choiceAway'])->name('choice.away');
Route::get('/shop/add-article', [ShopController::class, 'addArticle'])->name('add.article');
Route::get('/shop/create-account', [ShopController::class, 'createAccount'])->name('create.account');



Route::get('/pages/about', [PagesController::class, 'pagesAbout'])->name('pages.about');
Route::get('/pages/contact', [PagesController::class, 'pagesContact'])->name('pages.contact');
Route::get('/pages/signin', [PagesController::class, 'pagesSignin'])->name('pages.signin');
Route::get('/pages/signup', [PagesController::class, 'pagesSignup'])->name('pages.signup');
Route::get('/pages/forgot-password', [PagesController::class, 'pagesForgotPassword'])->name('pages.forgot-password');



Route::get('/account/profile', [AccountController::class, 'accountProfile'])->name('account.profile');
Route::get('/account/orders', [AccountController::class, 'accountOrders'])->name('account.orders');
Route::get('/account/adress', [AccountController::class, 'accountAdress'])->name('account.address');
Route::get('/account/settings', [AccountController::class, 'accountSettings'])->name('account.settings');
Route::get('/account/notification', [AccountController::class, 'accountNotification'])->name('account.notification');


Route::get('/store/grid', [storeController::class, 'storeGrid'])->name('store.grid');
// Route::get('/store/single/{uuid}', [StoreController::class, 'storeSingle'])->name('store.single');
// Route::get('/store', [StoreController::class, 'store'])->middleware(['auth', 'verified'])->name('store');
// Route::get('/store/reviews', [StoreController::class, 'storeReviews'])->middleware(['auth', 'verified'])->name('store.reviews');
// Avis sur un produit (uuid du produit)
Route::post('/store/reviews/{uuid}', [StoreController::class, 'storeReviewsAdd'])
    ->middleware(['auth', 'verified'])->name('store.reviews-add');

// Avis sur une boutique (pas d'uuid en paramètre — shop_uuid dans le form)
Route::post('/store/reviews', [StoreController::class, 'storeReviewsAdd'])
    ->middleware(['auth', 'verified'])->name('store.shop-review-add');
// Route::get('/store/contact', [StoreController::class, 'storeContact'])->middleware(['auth', 'verified'])->name('store.contact');

// Store public
Route::get('/stores',                  [StoreController::class, 'store'])->name('store');
Route::get('/store/single/{uuid?}',            [StoreController::class, 'storeSingle'])->name('store.single');
Route::get('/store/{uuid}/reviews',    [StoreController::class, 'storeReviews'])->name('store.reviews');
Route::get('/store/{uuid}/contact',    [StoreController::class, 'storeContact'])->name('store.contact');

Route::post('/review/{uuid}/helpful', [StoreController::class, 'helpful'])
    ->name('review.helpful')
    ->middleware('auth');

Route::post('/review/{uuid}/report', [StoreController::class, 'report'])
    ->name('review.report')
    ->middleware('auth');

Route::get('/blog', [BlogController::class, 'blog'])->name('blog');
Route::get('/blog/single/{uuid}', [BlogController::class, 'blogSingle'])->name('blog.single');
Route::patch('/admin/blog/{uuid}/toggle', [BlogController::class, 'adminToggleBlog'])->name('admin.blog-toggle');
Route::delete('/admin/blog/{uuid}',       [BlogController::class, 'adminDeleteBlog'])->name('admin.blog-delete');
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/blog-setting', [BlogController::class, 'adminBlogSetting'])->name('admin.blog-setting');
    Route::get('/admin/add-blog',     [BlogController::class, 'adminCreateBlog'])->name('admin.add-blog');
    Route::post('/admin/blog',        [BlogController::class, 'adminStoreBlog'])->name('admin.blog-store');
    Route::get('/admin/blog/{uuid}/edit', [BlogController::class, 'adminEditBlog'])->name('admin.blog-edit');
    Route::put('/admin/blog/{uuid}',      [BlogController::class, 'adminUpdateBlog'])->name('admin.blog-update');
});



Route::get('/admin/index', [AdminController::class, 'adminIndex'])->middleware(['auth', 'verified'])->name('admin.index');

Route::get('/admin/products', [AdminController::class, 'adminProducts'])->middleware(['auth', 'verified'])->name('admin.products');
Route::get('/admin/services', [AdminController::class, 'adminServices'])->middleware(['auth', 'verified'])->name('admin.services');
Route::get('/admin/locations', [AdminController::class, 'adminLocations'])->middleware(['auth', 'verified'])->name('admin.locations');

Route::get('/admin/add-product', [AdminController::class, 'adminAddProductForm'])->middleware(['auth', 'verified'])->name('admin.add-product-form');
Route::post('/admin/add-product2', [AdminController::class, 'adminAddProduct'])->middleware(['auth', 'verified'])->name('admin.add-product');
Route::get('/admin/add-service', [AdminController::class, 'adminAddService'])->middleware(['auth', 'verified'])->name('admin.add-service');
Route::get('/admin/add-location', [AdminController::class, 'adminAddLocation'])->middleware(['auth', 'verified'])->name('admin.add-location');

Route::get('/admin/categories', [AdminController::class, 'adminCategories'])
    ->name('admin.categories');
Route::post('/admin/categories', [AdminController::class, 'adminCategoryStore'])
    ->name('admin.categories.store');
Route::post('/admin/categories/{id}/toggle-status', [AdminController::class, 'adminCategoryToggleStatus'])
    ->name('admin.categories.toggle-status');
Route::delete('/admin/categories/{id}', [AdminController::class, 'adminCategoryDelete'])
    ->name('admin.categories.delete');

Route::get('/admin/add-category', [AdminController::class, 'adminAddCategory'])->middleware(['auth', 'verified'])->name('admin.add-category');
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/order-list', [AdminController::class, 'adminOrderList'])
        ->name('admin.order-list');
    Route::post('/admin/orders/{uuid}/status', [AdminController::class, 'adminOrderUpdateStatus'])
        ->name('admin.orders.update-status');
    Route::delete('/admin/orders/{uuid}', [AdminController::class, 'adminOrderDelete'])
        ->name('admin.orders.delete');
});
Route::get('/admin/order-single/{uuid}', [AdminController::class, 'adminOrderSingle'])->middleware(['auth', 'verified'])->name('admin.order-single');
Route::get('/admin/order-single-location', [AdminController::class, 'adminOrderSingleLocation'])->middleware(['auth', 'verified'])->name('admin.order-single-location');
Route::get('/admin/vendor-grid', [AdminController::class, 'adminVendorGrid'])->middleware(['auth', 'verified'])->name('admin.vendor-grid');
Route::post('/admin/shops/{uuid}/toggle-status', [AdminController::class, 'adminToggleShopStatus'])
    ->middleware(['auth', 'verified'])
    ->name('admin.toggle-shop-status');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/shops/create', [AdminController::class, 'adminCreateShop'])
        ->name('admin.create-shop');
    Route::post('/admin/shops', [AdminController::class, 'adminStoreShop'])
        ->name('admin.store-shop');
    Route::get('/admin/shops/{uuid}/edit', [AdminController::class, 'adminEditShop'])
        ->name('admin.edit-shop');
    Route::put('/admin/shops/{uuid}', [AdminController::class, 'adminUpdateShop'])
        ->name('admin.update-shop');
    Route::delete('/admin/shops/{uuid}/logo', [AdminController::class, 'adminDeleteShopLogo'])
        ->name('admin.delete-shop-logo');
});





Route::get('/admin/customers', [AdminController::class, 'adminCustomers'])
    ->name('admin.customers');

Route::get('/admin/customers/{uuid}/orders', [AdminController::class, 'adminCustomerOrders'])
    ->name('admin.customer-orders');
Route::get('/admin/reviews', [AdminController::class, 'adminReviews'])
    ->name('admin.reviews');

Route::delete('/admin/reviews/{uuid}', [AdminController::class, 'adminDeleteReview'])
    ->name('admin.review-delete');
Route::get('/admin/me-order-list', [AdminController::class, 'adminMeOrderList'])->middleware(['auth', 'verified'])->name('admin.me-order-list');
Route::get('/admin/me-order-single/{uuid}', [AdminController::class, 'adminMeOrderSingle'])->middleware(['auth', 'verified'])->name('admin.me-order-single');
Route::get('/admin/me-order-single-location', [AdminController::class, 'adminMeOrderSingleLocation'])->middleware(['auth', 'verified'])->name('admin.me-order-single-location');








// Ajouter ces routes dans web.php après les routes existantes

// Routes pour la gestion des produits
Route::middleware(['auth', 'verified'])->group(function () {

    // Voir les détails d'un produit
    Route::get('/admin/products/{id}/view', [AdminController::class, 'adminViewProduct'])
        ->name('admin.view-product');

    // Ajoutez une route pour l'édition
    Route::get('/admin/edit-product/{uuid}', [AdminController::class, 'adminEditProduct'])
        ->middleware(['auth', 'verified'])
        ->name('admin.edit-product');
    // Mettre à jour un produit
    // Ajoutez une route pour la mise à jour
    Route::post('/admin/update-product/{id}', [AdminController::class, 'adminUpdateProduct'])
        ->middleware(['auth', 'verified'])
        ->name('admin.update-product');

    Route::delete('/admin/products/images/{id}', [AdminController::class, 'adminDeleteProductImage'])
        ->middleware(['auth', 'verified'])
        ->name('admin.delete-product-image');

    // Supprimer un produit (AJAX)
    Route::delete('/admin/products/{id}/delete', [AdminController::class, 'adminDeleteProduct'])
        ->name('admin.delete-product');

    // Changer le statut d'un produit (AJAX)
    Route::post('/admin/products/{id}/toggle-status', [AdminController::class, 'adminToggleProductStatus'])
        ->name('admin.toggle-product-status');

    // Suppression en masse (AJAX)
    Route::delete('/admin/products/bulk-delete', [AdminController::class, 'adminBulkDeleteProducts'])
        ->name('admin.bulk-delete-products');


    Route::post('/wishlist/toggle/{uuid}', [ShopController::class, 'toggleWishlist'])
    ->middleware('auth')
    ->name('wishlist.toggle');
});


Route::middleware(['auth', 'verified'])->group(function () {

    // Mes articles personnels (sans boutique)
    Route::get('/account/my-items',          [AccountController::class, 'myItems'])->name('account.my-items');
    Route::get('/account/my-items/create',   [AccountController::class, 'myItemsCreate'])->name('account.my-items-create');
    Route::post('/account/my-items',         [AccountController::class, 'myItemsStore'])->name('account.my-items-store');
    Route::get('/account/my-items/{uuid}/edit', [AccountController::class, 'myItemsEdit'])->name('account.my-items-edit');
    Route::put('/account/my-items/{uuid}',   [AccountController::class, 'myItemsUpdate'])->name('account.my-items-update');
    Route::delete('/account/my-items/{uuid}',[AccountController::class, 'myItemsDelete'])->name('account.my-items-delete');

    // Échanges
    Route::get('/account/exchanges',         [ExchangeController::class, 'index'])->name('account.exchanges');
    Route::post('/exchange/propose/{uuid}',  [ExchangeController::class, 'propose'])->name('exchange.propose');
    Route::post('/exchange/{uuid}/accept',   [ExchangeController::class, 'accept'])->name('exchange.accept');
    Route::post('/exchange/{uuid}/reject',   [ExchangeController::class, 'reject'])->name('exchange.reject');
    Route::post('/exchange/{uuid}/counter',  [ExchangeController::class, 'counter'])->name('exchange.counter');
});



require __DIR__ . '/auth.php';
