<?php

use App\Http\Controllers\MasterProductController;
use App\Http\Controllers\MasterTransactionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    // return view('welcome');
    return redirect(route('dashboard'));
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    // Initial Route pages
    Route::get('dashboard', [ProfileController::class, 'dashboard'])->name('dashboard');
    // Profile Route pages
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(['restrict'])->group(function () {
        // Manage Product Route pages
        // Route::resource('product', MasterProductController::class);
        Route::get('product', [MasterProductController::class, 'index'])->name('product.index');
        Route::get('product/create', [MasterProductController::class, 'create'])->name('product.create');
        Route::post('product', [MasterProductController::class, 'store'])->name('product.store');
        Route::post('product/{id}/edit', [MasterProductController::class, 'edit'])->name('product.edit');
        Route::put('product/{id}', [MasterProductController::class, 'update'])->name('product.update');
        Route::post('product/{product}', [MasterProductController::class, 'show'])->name('product.show');
        Route::delete('product/{product}', [MasterProductController::class, 'destroy'])->name('product.destroy');
    });
    // Manage Transaction Route pages
    // Route::resource('transaction', MasterTransactionController::class);
    Route::get('transaction', [MasterTransactionController::class, 'index'])->name('transaction.index');
    Route::get('transaction/create', [MasterTransactionController::class, 'create'])->name('transaction.create');
    Route::post('transaction', [MasterTransactionController::class, 'store'])->name('transaction.store');
    Route::post('transaction/{id}/edit', [MasterTransactionController::class, 'edit'])->name('transaction.edit');
    Route::put('transaction/{id}', [MasterTransactionController::class, 'update'])->name('transaction.update');
    Route::post('transaction/{transaction}', [MasterTransactionController::class, 'show'])->name('transaction.show');
    Route::delete('transaction/{transaction}', [MasterTransactionController::class, 'destroy'])->name('transaction.destroy');

});

require __DIR__.'/auth.php';
