<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('landing');
})->name('landing');

    Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', \App\Livewire\Dashboard::class)->name('dashboard');
    Route::get('/subscription', \App\Livewire\Subscription::class)->name('subscriptionplan');
    Route::get('/subscription/transaction', \App\Livewire\SubscriptionTransaction::class)->name('subscriptiontransaction');
    Route::prefix('admin')->group(function () {
        Route::get('/admin-dashboard', \App\Livewire\AdminDashboard::class)->name('admindashboard')->middleware('role:SuperAdmin');
        Route::get('/manage-courses', \App\Livewire\ManageCourses::class)->name('managecourses')->middleware('role:SuperAdmin');
        Route::get('/manage-categories', \App\Livewire\ManageCategories::class)->name('managecategories')->middleware('role:SuperAdmin');
        Route::get('/manage-users', \App\Livewire\ManageUsers::class)->name('manageusers')->middleware('role:SuperAdmin');
        Route::get('/course-detail/{id}', \App\Livewire\CourseDetail::class)->name('coursedetail')->middleware('role:SuperAdmin');
        Route::post('/upload/image', [UploadController::class, 'uploadImage'])->name('upload.image')->middleware('role:SuperAdmin');
    });
    Route::prefix('courses')->group(function () {
        Route::get('/all-course', \App\Livewire\Courses::class)->name('allcourse');
        Route::get('/create-course', \App\Livewire\CreateCourse::class)->name('createcourse');
        Route::get('/course/edit/{id}', \App\Livewire\EditCourse::class)->name('editcourse')->middleware('can:edit-course');
        Route::get('/show-course/{id}', \App\Livewire\ShowCourse::class)->name('showcourse');
        Route::get('/player/{courseId}/{lessonId?}', \App\Livewire\CoursePlayer::class)->name('courseplayer');
        Route::get('/certificate/{courseId}', [CertificateController::class, 'download'])->name('certificate.download');
        Route::get('/in-progress', \App\Livewire\Inprogress::class)->name('inprogress');
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
