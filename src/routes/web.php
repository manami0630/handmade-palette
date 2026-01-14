<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;

Route::get('/', [ProductController::class, 'index']);

Route::middleware(['auth','verified'])->group(function () {
    Route::get('/mypage', [ProductController::class, 'mypage']);

    Route::get('/post', [ProductController::class, 'post']);

    Route::get('/products/{id}', [ProductController::class, 'detail']);

    Route::delete('/products/{id}/delete', [ProductController::class, 'destroy'])->name('products.destroy');

    Route::patch('/products/{id}/update', [ProductController::class, 'update'])->name('products.update');

    Route::post('/product/upload', [ProductController::class, 'store'])->name('product.store');

    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

    Route::post('/likes/toggle', [LikeController::class, 'toggle'])->name('likes.toggle');
});