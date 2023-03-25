<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Shop\ProductController;
use App\Models\category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use PharIo\Manifest\Author;

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
Route::get('/', [ProductController::class,'index']); 
Route::get('/products', [ProductController::class,'index']); 
Route::get('/products/{slug}', [ProductController::class,'showBySlug']); 
Route::get('/admin/categories/trash',[AdminCategoryController::class,'trash'])->name('category.trash');
Route::get('/admin/categories/restore/{id}',[AdminCategoryController::class,'restore']);
Route::get('/admin/categories/remove/{id}',[AdminCategoryController::class,'remove']);

Route::resource('/admin/categories', AdminCategoryController::class);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
