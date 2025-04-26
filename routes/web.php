<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PortfolioController as AdminPortfolioController;
use App\Http\Controllers\Admin\SettingsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Portfolio public routes
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/portfolio/{id}', [PortfolioController::class, 'show'])->name('portfolio.show');

// Redirect for About Me to display on the homepage
Route::get('/about-me', function() {
    return redirect('/#about-me');
})->name('about.me');

// Admin auth routes
require __DIR__.'/auth.php';

// Admin routes (protected by auth middleware)
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Portfolio Management
    Route::resource('portfolios', AdminPortfolioController::class);
    Route::post('portfolios/order', [AdminPortfolioController::class, 'updateOrder'])->name('portfolios.order');
    
    // Settings
    Route::prefix('settings')->name('settings.')->group(function () {
        // General Manager Settings
        Route::get('/general-manager', [SettingsController::class, 'generalManager'])->name('general-manager');
        Route::post('/general-manager', [SettingsController::class, 'updateGeneralManager'])->name('general-manager.update');
        
        // Company Settings
        Route::get('/company', [SettingsController::class, 'company'])->name('company');
        Route::post('/company', [SettingsController::class, 'updateCompany'])->name('company.update');
        
        // Contact Settings
        Route::get('/contact', [SettingsController::class, 'contact'])->name('contact');
        Route::post('/contact', [SettingsController::class, 'updateContact'])->name('contact.update');
    });
    
    // Messages
    Route::resource('messages', MessageController::class)->only(['index', 'show', 'destroy']);
    Route::post('messages/{message}/read', [MessageController::class, 'markAsRead'])->name('messages.read');
    Route::post('messages/{message}/unread', [MessageController::class, 'markAsUnread'])->name('messages.unread');
    
    // Profile management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});