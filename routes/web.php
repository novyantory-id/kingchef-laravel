<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EditorPickController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\Writer\DashboardController as WriterDashboardController;
use App\Http\Controllers\Writer\PostController as WriterPostController;
use App\Http\Controllers\Writer\SettingController as WriterSettingController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/ping', fn() => response()->json(['status' => 'ok']));

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login_action']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// ------------------------FRONTEND----------------------------
Route::get('/', [FrontendController::class, 'index'])->name('index');

// all articles view
Route::get('/articles', [FrontendController::class, 'articles'])
    ->name('frontend.articles.show');

// post by categories
Route::get('/category/{slug}', [FrontendController::class, 'category'])
    ->name('frontend.category.show');

// post by tags
Route::get('/tag/{slug}', [FrontendController::class, 'tag'])
    ->name('frontend.tag.show');

// post by users
Route::get('/author/{username}', [FrontendController::class, 'author'])
    ->name('frontend.author.show');

// article view
Route::get('/{slug}', [FrontendController::class, 'article'])
    ->name('frontend.article.show');

// ------------------------ADMIN ROLE----------------------------
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'role:admin'])->name('admin.dashboard');

//settings
Route::get('/admin/settings', [SettingController::class, 'index'])->middleware(['auth', 'role:admin'])->name('admin.settings');
Route::put('/admin/settings/profile', [SettingController::class, 'updateProfile'])->middleware(['auth', 'role:admin'])->name('admin.settings.profile');
Route::put('/admin/settings/password', [SettingController::class, 'updatePassword'])->middleware(['auth', 'role:admin'])->name('admin.settings.password');

// category
Route::get('/admin/categories', [CategoryController::class, 'index'])->middleware(['auth', 'role:admin'])->name('admin.category');
Route::post('/admin/categories', [CategoryController::class, 'save'])->middleware(['auth', 'role:admin'])->name('admin.category');
Route::get('/admin/categories/{id}/edit', [CategoryController::class, 'edit'])->middleware(['auth', 'role:admin'])->name('admin.category.edit');
Route::post('/admin/categories/{id}/edit', [CategoryController::class, 'update'])->middleware(['auth', 'role:admin'])->name('admin.category.update');
Route::get('/admin/categories/{id}/delete', [CategoryController::class, 'delete'])->middleware(['auth', 'role:admin'])->name('admin.category.delete');

// tag
Route::get('/admin/tags', [TagController::class, 'index'])->middleware(['auth', 'role:admin'])->name('admin.tag');
Route::get('/admin/tags/{id}/edit', [TagController::class, 'edit'])->middleware(['auth', 'role:admin'])->name('admin.tag.edit');
Route::post('/admin/tags/{id}/edit', [TagController::class, 'update'])->middleware(['auth', 'role:admin'])->name('admin.tag.update');
Route::get('/admin/tags/{id}/delete', [TagController::class, 'delete'])->middleware(['auth', 'role:admin'])->name('admin.tag.delete');

//users
Route::get('/admin/users', [UserController::class, 'index'])->middleware(['auth', 'role:admin'])->name('admin.users');
Route::get('/admin/users/add', [UserController::class, 'add'])->middleware(['auth', 'role:admin'])->name('admin.users.add');
Route::post('/admin/users/add', [UserController::class, 'save'])->middleware(['auth', 'role:admin'])->name('admin.users.save');
Route::get('/admin/users/{id}/edit', [UserController::class, 'edit'])->middleware(['auth', 'role:admin'])->name('admin.users.edit');
Route::post('/admin/users/{id}/edit', [UserController::class, 'update'])->middleware(['auth', 'role:admin'])->name('admin.users.update');
Route::delete('/admin/users/{id}/delete', [UserController::class, 'delete'])->middleware(['auth', 'role:admin'])->name('admin.users.delete');

// posts
Route::get('/admin/posts', [PostController::class, 'index'])->middleware(['auth', 'role:admin'])->name('admin.posts');
Route::get('/admin/posts/all', [PostController::class, 'all'])->middleware(['auth', 'role:admin'])->name('admin.posts.all');
Route::post('/admin/posts/add', [PostController::class, 'add'])->middleware(['auth', 'role:admin'])->name('admin.posts.add');
Route::get('/admin/posts/edit/{slug}', [PostController::class, 'edit'])->middleware(['auth', 'role:admin'])->name('admin.posts.edit');
Route::put('/admin/posts/edit/{slug}', [PostController::class, 'update'])->middleware(['auth', 'role:admin'])->name('admin.posts.update');

// editor picks
Route::get('/admin/editor', [EditorPickController::class, 'index'])->middleware(['auth', 'role:admin'])->name('admin.editor');
Route::post('/admin/editor-picks/update', [EditorPickController::class, 'update'])->middleware(['auth', 'role:admin'])->name('admin.editor-picks.update');

// upload
Route::post('/upload-image', [MediaController::class, 'upload'])
    ->middleware(['auth', 'role:admin'])
    ->name('upload.image'); // Hanya pengguna yang login yang dapat mengakses
Route::get('/media', [MediaController::class, 'index'])->name('media.load');
Route::post('/delete-image', [MediaController::class, 'deleteImage'])
    ->middleware(['auth', 'role:admin'])
    ->name('delete.image');

Route::get('/admin/media', [MediaController::class, 'index'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.media.index');
Route::post('/delete-media', [MediaController::class, 'deleteMedia'])
    ->middleware(['auth', 'role:admin'])
    ->name('delete.media');

Route::get('/test-helper', function () {
    return formatBytes(1024); // Harus mengembalikan "1 KB"
});

// routes/web.php
Route::get('/test-file', function () {
    $path = 'content/1_003.jpg';
    return [
        'exists' => Storage::disk('public')->exists($path),
        'full_path' => storage_path('app/public/' . $path),
        'files_in_content' => Storage::disk('public')->allFiles('content')
    ];
});

// Route::post('/media/upload', [MediaController::class, 'upload'])
//     ->middleware(['auth', 'role:admin'])
//     ->name('upload.image');
// ------------------------WRITER ROLE----------------------------
Route::get('/writer/dashboard', [WriterDashboardController::class, 'index'])->middleware(['auth', 'role:writer'])->name('writer.dashboard');

// posts
Route::get('/writer/posts', [WriterPostController::class, 'index'])->middleware(['auth', 'role:writer'])->name('writer.posts');
Route::get('/writer/posts/all', [WriterPostController::class, 'all'])->middleware(['auth', 'role:writer'])->name('writer.posts.all');
Route::post('/writer/posts/add', [WriterPostController::class, 'add'])->middleware(['auth', 'role:writer'])->name('writer.posts.add');
Route::get('/writer/posts/edit/{slug}', [WriterPostController::class, 'edit'])->middleware(['auth', 'role:writer'])->name('writer.posts.edit');
Route::put('/writer/posts/edit/{slug}', [WriterPostController::class, 'update'])->middleware(['auth', 'role:writer'])->name('writer.posts.update');

//settings
Route::get('/writer/settings', [WriterSettingController::class, 'index'])->middleware(['auth', 'role:writer'])->name('writer.settings');
Route::put('/writer/settings/profile', [WriterSettingController::class, 'updateProfile'])->middleware(['auth', 'role:writer'])->name('writer.settings.profile');
Route::put('/writer/settings/password', [WriterSettingController::class, 'updatePassword'])->middleware(['auth', 'role:writer'])->name('writer.settings.password');
