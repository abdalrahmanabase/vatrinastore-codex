<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::middleware(['auth', 'admin'])->group(function () {
    // Category Routes
    Route::get('/categories', App\Livewire\Category\Categoryindex::class)->name('categories.index');
    Route::get('/categories/create', App\Livewire\Category\Categorycreate::class)->name('categories.create');
    Route::get('/categories/{category}/edit', App\Livewire\Category\Categoryedit::class)->name('categories.edit');

    // SubCategory Routes
    Route::get('/subcategories', App\Livewire\SubCategory\SubCategoryindex::class)->name('subcategories.index');
    Route::get('/subcategories/create', App\Livewire\SubCategory\SubCategorycreate::class)->name('subcategories.create');
    Route::get('/subcategories/{subCategory}/edit', App\Livewire\SubCategory\SubCategoryedit::class)->name('subcategories.edit');

    // Tags Routes
    Route::get('/tags', App\Livewire\Tags\TagsIndex::class)->name('tags.index');
    Route::get('/tags/create', App\Livewire\Tags\TagsCreate::class)->name('tags.create');
    Route::get('/tags/{tag}/edit', App\Livewire\Tags\TagsEdit::class)->name('tags.edit');
});
