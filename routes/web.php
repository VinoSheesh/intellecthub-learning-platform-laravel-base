<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', \App\Livewire\Dashboard::class)->name('dashboard');
    Route::get('/subscription', \App\Livewire\Subscription::class)->name('subscriptionplan');
    Route::get('/subscription/transaction', \App\Livewire\SubscriptionTransaction::class)->name('subscriptiontransaction');
    Route::prefix('admin')->group(function () {
        Route::get('/admindashboard', \App\Livewire\AdminDashboard::class)->name('admindashboard')->middleware('role:SuperAdmin');
        Route::get('/managecourses', \App\Livewire\ManageCourses::class)->name('managecourses')->middleware('role:SuperAdmin');
    });
    Route::prefix('courses')->group(function () {
        Route::get('/allcourse', \App\Livewire\Courses::class)->name('allcourse');
        Route::get('/createcourse', \App\Livewire\Createcourse::class)->name('createcourse');
        Route::get('/course/edit/{id}', \App\Livewire\EditCourse::class)->name('editcourse')->middleware('can:edit-course');
        Route::get('/showcourse/{id}', \App\Livewire\ShowCourse::class)->name('showcourse');
        Route::get('/inprogress', \App\Livewire\Inprogress::class)->name('inprogress');
        Route::get('/completed', \App\Livewire\Completed::class)->name('completed');
        Route::get('/favorites', \App\Livewire\Favorites::class)->name('favorites');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
