<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



use App\Http\Controllers\ShopController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;

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
Route::get('/', [ShopController::class , 'welcome'])->name('welcome');
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






Route::get('/base', [ShopController::class , 'base'])->name('base');

Route::get('/shop/wishlist', [ShopController::class , 'shopWishlist'])->name('shop.wishlist');
Route::get('/shop/cart', [ShopController::class , 'shopCart'])->name('shop.cart');

// Dans web.php, modifiez la route shop.single pour accepter un slug
Route::get('/shop/product/{slug}', [ShopController::class, 'shopSingle'])->name('shop.single', ['slug' => 1]);

Route::get('/shop/single-service', [ShopController::class , 'shopSingleService'])->name('shop.single-service');
Route::get('/shop/single-location', [ShopController::class , 'shopSingleLocation'])->name('shop.single-location');

Route::get('/shop/fullwidth', [ShopController::class , 'shopFullwidth'])->name('shop.fullwidth');
Route::get('/shop/checkout', [ShopController::class , 'shopCheckout'])->name('shop.checkout');

Route::get('/shop/select-product', [ShopController::class , 'shopSelectProduct'])->name('shop.select-product');
Route::get('/shop/select-service', [ShopController::class , 'shopSelectService'])->name('shop.select-service');
Route::get('/shop/select-location', [ShopController::class , 'shopSelectLocation'])->name('shop.select-location');

Route::get('/shop/view-all-products', [ShopController::class , 'viewAllProducts'])->name('view.all.products');
Route::get('/shop/view-all-services', [ShopController::class , 'viewAllServices'])->name('view.all.services');
Route::get('/shop/view-all-locations', [ShopController::class , 'viewAllLocations'])->name('view.all.locations');
Route::get('/shop/choice-away', [ShopController::class , 'choiceAway'])->name('choice.away');
Route::get('/shop/add-article', [ShopController::class , 'addArticle'])->name('add.article');
Route::get('/shop/create-account', [ShopController::class , 'createAccount'])->name('create.account');



Route::get('/pages/about', [PagesController::class , 'pagesAbout'])->name('pages.about');
Route::get('/pages/contact', [PagesController::class , 'pagesContact'])->name('pages.contact');
Route::get('/pages/signin', [PagesController::class , 'pagesSignin'])->name('pages.signin');
Route::get('/pages/signup', [PagesController::class , 'pagesSignup'])->name('pages.signup');
Route::get('/pages/forgot-password', [PagesController::class , 'pagesForgotPassword'])->name('pages.forgot-password');



Route::get('/account/profile', [AccountController::class , 'accountProfile'])->name('account.profile');
Route::get('/account/orders', [AccountController::class , 'accountOrders'])->name('account.orders');
Route::get('/account/adress', [AccountController::class , 'accountAdress'])->name('account.address');
Route::get('/account/settings', [AccountController::class , 'accountSettings'])->name('account.settings');
Route::get('/account/notification', [AccountController::class , 'accountNotification'])->name('account.notification');


Route::get('/store/grid', [storeController::class , 'storeGrid'])->name('store.grid');
Route::get('/store/single', [StoreController::class , 'storeSingle'])->name('store.single');
Route::get('/store', [StoreController::class , 'store'])->middleware(['auth', 'verified'])->name('store');
Route::get('/store/reviews', [StoreController::class , 'storeReviews'])->middleware(['auth', 'verified'])->name('store.reviews');
Route::get('/store/contact', [StoreController::class , 'storeContact'])->middleware(['auth', 'verified'])->name('store.contact');

Route::get('/blog', [BlogController::class , 'blog'])->name('blog');
Route::get('/blog/single', [BlogController::class , 'blogSingle'])->name('blog.single');

                        

Route::get('/admin/index', [AdminController::class , 'adminIndex'])->middleware(['auth', 'verified'])->name('admin.index');

Route::get('/admin/products', [AdminController::class , 'adminProducts'])->middleware(['auth', 'verified'])->name('admin.products');
Route::get('/admin/services', [AdminController::class , 'adminServices'])->middleware(['auth', 'verified'])->name('admin.services');
Route::get('/admin/locations', [AdminController::class , 'adminLocations'])->middleware(['auth', 'verified'])->name('admin.locations');

Route::get('/admin/add-product', [AdminController::class , 'adminAddProduct'])->middleware(['auth', 'verified'])->name('admin.add-product');
Route::post('/admin/add-product2', [AdminController::class , 'adminAddProduct2'])->middleware(['auth', 'verified'])->name('admin.add-product2');
Route::get('/admin/add-service', [AdminController::class , 'adminAddService'])->middleware(['auth', 'verified'])->name('admin.add-service');
Route::get('/admin/add-location', [AdminController::class , 'adminAddLocation'])->middleware(['auth', 'verified'])->name('admin.add-location');

Route::get('/admin/categories', [AdminController::class , 'adminCategories'])->middleware(['auth', 'verified'])->name('admin.categories');
Route::get('/admin/add-category', [AdminController::class , 'adminAddCategory'])->middleware(['auth', 'verified'])->name('admin.add-category');
Route::get('/admin/order-list', [AdminController::class , 'adminOrderList'])->middleware(['auth', 'verified'])->name('admin.order-list');
Route::get('/admin/order-single', [AdminController::class , 'adminOrderSingle'])->middleware(['auth', 'verified'])->name('admin.order-single');
Route::get('/admin/order-single-location', [AdminController::class , 'adminOrderSingleLocation'])->middleware(['auth', 'verified'])->name('admin.order-single-location');
Route::get('/admin/vendor-grid', [AdminController::class , 'adminVendorGrid'])->middleware(['auth', 'verified'])->name('admin.vendor-grid');
Route::get('/admin/customers', [AdminController::class , 'adminCustomers'])->middleware(['auth', 'verified'])->name('admin.customers');
Route::get('/admin/reviews', [AdminController::class , 'adminReviews'])->middleware(['auth', 'verified'])->name('admin.reviews');
Route::get('/admin/me-order-list', [AdminController::class , 'adminMeOrderList'])->middleware(['auth', 'verified'])->name('admin.me-order-list');
Route::get('/admin/me-order-single', [AdminController::class , 'adminMeOrderSingle'])->middleware(['auth', 'verified'])->name('admin.me-order-single');
Route::get('/admin/me-order-single-location', [AdminController::class , 'adminMeOrderSingleLocation'])->middleware(['auth', 'verified'])->name('admin.me-order-single-location');
Route::get('/admin/blog-setting', [AdminController::class , 'adminBlogSetting'])->middleware(['auth', 'verified'])->name('admin.blog-setting');
Route::get('/admin/add-blog', [AdminController::class , 'adminAddBlog'])->middleware(['auth', 'verified'])->name('admin.add-blog');








// Ajouter ces routes dans web.php après les routes existantes

// Routes pour la gestion des produits
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Voir les détails d'un produit
    Route::get('/admin/products/{id}/view', [AdminController::class, 'adminViewProduct'])
        ->name('admin.view-product');
    
// Ajoutez une route pour l'édition
Route::get('/admin/edit-product/{slug}', [AdminController::class, 'adminEditProduct'])
    ->middleware(['auth', 'verified'])
    ->name('admin.edit-product');
    // Mettre à jour un produit
// Ajoutez une route pour la mise à jour
Route::post('/admin/update-product/{id}', [AdminController::class, 'adminUpdateProduct'])
    ->middleware(['auth', 'verified'])
    ->name('admin.update-product');
    
    // Supprimer un produit (AJAX)
    Route::delete('/admin/products/{id}/delete', [AdminController::class, 'adminDeleteProduct'])
        ->name('admin.delete-product');
    
    // Changer le statut d'un produit (AJAX)
    Route::post('/admin/products/{id}/toggle-status', [AdminController::class, 'adminToggleProductStatus'])
        ->name('admin.toggle-product-status');
    
    // Suppression en masse (AJAX)
    Route::delete('/admin/products/bulk-delete', [AdminController::class, 'adminBulkDeleteProducts'])
        ->name('admin.bulk-delete-products');
});




require __DIR__.'/auth.php';
