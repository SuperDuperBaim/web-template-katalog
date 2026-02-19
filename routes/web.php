<?php


use App\Http\Controllers\TemplateController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TemplateController::class, 'index'])->name('home');

// Auth Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes (Protected - Admin Only)
Route::middleware(['auth'])->group(function () {
    
    // Simple Admin Check logic
    Route::group(['middleware' => function ($request, $next) {
        if (!auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }], function () {
        Route::get('/admin/tambah', [AdminController::class, 'create'])->name('admin.create');
        Route::post('/admin/simpan', [AdminController::class, 'store'])->name('admin.store');
        
        // CRUD Routes
        Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
        Route::put('/admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');
        Route::delete('/admin/hapus/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
    });
});

