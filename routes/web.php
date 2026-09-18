<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AboutSettingController as AdminAboutSettingController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ContactSettingController as AdminContactSettingController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\NotificationController as AdminNotificationController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\SeoSettingController as AdminSeoSettingController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\Admin\StockController as AdminStockController;
use App\Http\Controllers\Admin\WishlistController as AdminWishlistController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

// Customer Storefront Routes
Route::get('/', [ShopController::class, 'index'])->name('shop.index');
Route::get('/category/{slug}', [ShopController::class, 'category'])->name('shop.category');
Route::get('/product/{slug}', [ShopController::class, 'show'])->name('shop.show');

// Blog Routes
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// About Us Page Route
Route::get('/about', [AboutController::class, 'index'])->name('about.index');

// Contact Us Page Routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Cart Routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/buy-now/{id}', [CartController::class, 'buyNow'])->name('cart.buyNow');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

// Wishlist Routes (Customer)
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
Route::post('/wishlist/add/{id}', [WishlistController::class, 'store'])->name('wishlist.store');
Route::delete('/wishlist/remove/{id}', [WishlistController::class, 'remove'])->name('wishlist.remove');

// Checkout & Customer Lookup Routes
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/checkout/success/{orderNumber}', [CheckoutController::class, 'success'])->name('checkout.success');
Route::get('/api/customer-lookup/{phone}', [CheckoutController::class, 'lookupCustomerByPhone'])->name('customer.lookup');

// Admin Authentication Routes
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Admin Panel Routes (Protected by admin.auth middleware)
Route::prefix('admin')->name('admin.')->middleware('admin.auth')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Products CRUD
    Route::resource('products', AdminProductController::class);

    // Categories CRUD
    Route::resource('categories', AdminCategoryController::class);

    // Blog Posts CRUD
    Route::resource('posts', AdminPostController::class);

    // About Us Page Settings
    Route::get('about', [AdminAboutSettingController::class, 'index'])->name('about.index');
    Route::put('about', [AdminAboutSettingController::class, 'update'])->name('about.update');

    // Contact Page & Messages Settings
    Route::get('contact', [AdminContactSettingController::class, 'index'])->name('contact.index');
    Route::put('contact', [AdminContactSettingController::class, 'update'])->name('contact.update');
    Route::delete('contact/messages/{id}', [AdminContactSettingController::class, 'deleteMessage'])->name('contact.deleteMessage');

    // Site Settings & Dynamic Logos
    Route::get('settings', [AdminSettingController::class, 'index'])->name('settings.index');
    Route::post('settings/site-info', [AdminSettingController::class, 'updateSiteInfo'])->name('settings.updateSiteInfo');
    Route::post('settings/payment-logos', [AdminSettingController::class, 'updatePaymentLogos'])->name('settings.updatePaymentLogos');
    Route::post('settings/reset-logo/{type}', [AdminSettingController::class, 'resetLogo'])->name('settings.resetLogo');
    Route::post('settings/favicon', [AdminSettingController::class, 'updateFavicon'])->name('settings.updateFavicon');
    Route::post('settings/favicon/reset', [AdminSettingController::class, 'resetFavicon'])->name('settings.resetFavicon');

    // Stock Management (Category-wise)
    Route::get('stock', [AdminStockController::class, 'index'])->name('stock.index');
    Route::patch('stock/{id}', [AdminStockController::class, 'update'])->name('stock.update');

    // SEO Settings
    Route::get('seo', [AdminSeoSettingController::class, 'index'])->name('seo.index');
    Route::put('seo/{id}', [AdminSeoSettingController::class, 'update'])->name('seo.update');

    // Orders Management
    Route::get('orders', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::get('orders/bin', [AdminOrderController::class, 'bin'])->name('orders.bin');
    Route::get('orders/{id}', [AdminOrderController::class, 'show'])->name('orders.show');
    Route::patch('orders/{id}/status', [AdminOrderController::class, 'updateStatus'])->name('orders.updateStatus');
    Route::post('orders/{id}/restore', [AdminOrderController::class, 'restore'])->name('orders.restore');
    Route::delete('orders/{id}/force-delete', [AdminOrderController::class, 'forceDelete'])->name('orders.forceDelete');
    Route::delete('orders/{id}', [AdminOrderController::class, 'destroy'])->name('orders.destroy');

    // Wishlists Management (Admin)
    Route::get('wishlists', [AdminWishlistController::class, 'index'])->name('wishlists.index');
    Route::post('wishlists/{id}/notify', [AdminWishlistController::class, 'notify'])->name('wishlists.notify');
    Route::delete('wishlists/{id}', [AdminWishlistController::class, 'destroy'])->name('wishlists.destroy');

    // Notifications Management
    Route::get('notifications/read/{type}/{id}', [AdminNotificationController::class, 'markAsRead'])->name('notifications.read');
    Route::post('notifications/mark-all-read', [AdminNotificationController::class, 'markAllAsRead'])->name('notifications.markAllRead');
});
