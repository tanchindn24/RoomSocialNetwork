<?php

use App\Http\Controllers\Admin\AuthController as AdminAuth;
use App\Http\Controllers\Admin\ServiceRoomController;
use App\Http\Controllers\Provider\AuthController as ProviderAuth;
use App\Http\Controllers\Provider\RoomController;
use App\Http\Controllers\Seeker\AuthController as SeekerAuth;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Guest\GuestController;
use App\Http\Controllers\Seeker\SeekerController;
use App\Http\Controllers\Provider\ProviderController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Provider\PostsController;


// GUEST
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/list-posts', [HomeController::class, 'listPosts'])->name('home.list.posts');
Route::get('/detail-posts', [HomeController::class, 'detailPosts'])->name('home.detail.posts');
Route::get('/login', [HomeController::class, 'login'])->name('home.login');
Route::post('/login', [HomeController::class, 'store'])->name('login.store');
Route::get('/register', [HomeController::class, 'register'])->name('home.register');
Route::post('/register', [HomeController::class, 'store'])->name('register.store');
// SEEKER
Route::get('admin/login', [SeekerAuth::class, 'login'])->name('admin.login');
Route::post('admin/login-store', [SeekerAuth::class, 'loginStore'])->name('admin.login.store');
Route::get('admin/register', [SeekerAuth::class, 'register'])->name('admin.register');
Route::post('admin/register-store', [SeekerAuth::class, 'registerStore'])->name('admin.register.store');
Route::get('admin/logout', [SeekerAuth::class, 'logout'])->name('admin.logout');
Route::group(['prefix' => '/'], function () {
    Route::get('seeker', [SeekerController::class, 'index'])->name('seeker.index');
});
// PROVIDER
Route::get('provider/login', [ProviderAuth::class, 'login'])->name('provider.login');
Route::post('provider/login-store', [ProviderAuth::class, 'loginStore'])->name('provider.login.store');
Route::get('provider/register', [ProviderAuth::class, 'register'])->name('provider.register');
Route::post('provider/register-store', [ProviderAuth::class, 'registerStore'])->name('provider.register.store');
Route::get('provider/logout', [ProviderAuth::class, 'logout'])->name('provider.logout');

Route::group(['prefix' => 'provider', 'middleware' => ['provider']], function () {
    Route::get('/', [ProviderController::class, 'index'])->name('provider.index');
    Route::get('posts', [ProviderController::class, 'posts'])->name('provider.posts_list');
    Route::get('posts-create', [PostsController::class, 'postsCreate'])->name('provider.posts.create');
    Route::post('posts-store', [PostsController::class, 'postsStore'])->name('provider.posts.store');
    Route::get('services-list', [RoomController::class, 'serviceList'])->name('provider.services.list');
    Route::get('services-create', [RoomController::class, 'serviceCreate'])->name('provider.services.create');
    Route::post('services-store', [RoomController::class, 'serviceStore'])->name('provider.services.store');
    Route::get('services-edit/{id}', [RoomController::class, 'serviceEdit'])->name('provider.services.edit');
    Route::put('services-update/{id}', [RoomController::class, 'serviceUpdate'])->name('provider.services.update');
    Route::delete('services-delete/{id}', [RoomController::class, 'serviceDelete'])->name('provider.services.delete');
});
// ADMIN
Route::get('admin/login', [AdminAuth::class, 'login'])->name('admin.login');
Route::post('admin/login-store', [AdminAuth::class, 'loginStore'])->name('admin.login.store');
Route::get('admin/register', [AdminAuth::class, 'register'])->name('admin.register');
Route::post('admin/register-store', [AdminAuth::class, 'registerStore'])->name('admin.register.store');
Route::get('admin/logout', [AdminAuth::class, 'logout'])->name('admin.logout');

Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('users-provider', [AdminController::class, 'providerList'])->name('admin.users.provider');
    Route::get('users-seeker', [AdminController::class, 'seekerList'])->name('admin.users.seeker');
    Route::get('post-list', [AdminController::class, 'postList'])->name('admin.post.list');
    Route::get('category-list', [AdminController::class, 'categoryList'])->name('admin.category.list');
    Route::get('category-list-add', [AdminController::class, 'categoryListAdd'])->name('admin.category.list.add');
    Route::get('service-category-list', [ServiceRoomController::class, 'serviceCategoryList'])->name('admin.serviceCategory.list');
    Route::post('service-category-store', [ServiceRoomController::class, 'serviceCategoryStore'])->name('admin.serviceCategory.store');
    Route::put('service-category-inactive/{id}', [ServiceRoomController::class, 'serviceCategoryInactive'])->name('admin.serviceCategory.inactive');
    Route::put('service-category-active/{id}', [ServiceRoomController::class, 'serviceCategoryActive'])->name('admin.serviceCategory.active');
});
// OTHER
Route::get('/clear-cache', function () {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cache is cleared";
})->name('clear.cache');
