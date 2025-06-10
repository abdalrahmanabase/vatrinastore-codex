<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/shop', function () {
    $products = App\Models\Product::latest()->get();
    return view('shop', ['products' => $products]);
})->name('shop');

Route::view('/cart', 'cart')->name('cart');
Route::view('/checkout', 'checkout')->name('checkout');

require __DIR__.'/auth.php';

Route::middleware(['auth', 'admin'])->group(function () {
    // Category Routes
    Route::get('/categories', App\Livewire\Category\CategoryIndex::class)->name('categories.index');
    Route::get('/categories/create', App\Livewire\Category\CategoryCreate::class)->name('categories.create');
    Route::get('/categories/{category}/edit', App\Livewire\Category\CategoryEdit::class)->name('categories.edit');

    // SubCategory Routes
    Route::get('/subcategories', App\Livewire\SubCategory\SubCategoryIndex::class)->name('subcategories.index');
    Route::get('/subcategories/create', App\Livewire\SubCategory\SubCategoryCreate::class)->name('subcategories.create');
    Route::get('/subcategories/{subCategory}/edit', App\Livewire\SubCategory\SubCategoryEdit::class)->name('subcategories.edit');

    // Tags Routes
    Route::get('/tags', App\Livewire\Tags\TagsIndex::class)->name('tags.index');
    Route::get('/tags/create', App\Livewire\Tags\TagsCreate::class)->name('tags.create');
    Route::get('/tags/{tag}/edit', App\Livewire\Tags\TagsEdit::class)->name('tags.edit');

    // Product Routes
    Route::get('/products', App\Livewire\Product\ProductIndex::class)->name('products.index');
    Route::get('/products/create', App\Livewire\Product\ProductCreate::class)->name('products.create');
    Route::get('/products/{product}/edit', App\Livewire\Product\ProductEdit::class)->name('products.edit');
});

// Frontend product page
Route::get('/products/{slug}', App\Livewire\Product\ProductShow::class)->name('products.show');
