<?php

use App\Http\Controllers\{AuthController, AdminController,AdvisorController};
use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function () {
    // Admin login
    Route::get('/', [AuthController::class, 'AdminLogin'])->name('adminLogin');
    Route::post('/admin/login', [AuthController::class, 'handleAdminLogin'])->name('admin.login.submit');
    Route::post('/admin/register', [AuthController::class, 'handleAdminRegister'])->name('admin.register.submit');
    Route::get('/logout/admin', [AuthController::class, 'adminlogout'])->name('admin.logout');
    // Legal Advisor login
    Route::get('/lageladvisor/login', [AuthController::class, 'Ligaladvisor'])->name('lageladvisor');
    Route::post('/lageladvisor/login', [AuthController::class, 'LigaladvisorLogin'])->name('lageladvisor.login');
    Route::post('/lageladvisor/register', [AuthController::class, 'LigaladvisorRegister'])->name('lageladvisor.register');
    Route::get('/logout/lageladvisor', [AuthController::class, 'logout'])->name('lageladvisor.logout');
});

Route::prefix('admin')->group(function () {
    Route::middleware('admin')->group(function () {
        Route::prefix('dashboard')->group(function () {
            Route::get('/', [AuthController::class, 'Admind'])->name('admind');
            Route::get('/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
            Route::put('/admin/{id}', [AdminController::class, 'update'])->name('admin.update');
            // case route section
            Route::get('/create/case', [AdminController::class, 'CreateCase'])->name('admin.CreateCase');
            Route::post('/cases/store', [AdminController::class, 'store'])->name('cases.store');
            Route::get('/details/case/{id}', [AdminController::class, 'DatailsCase'])->name('admin.DatailsCase');
            Route::get('/edit/case/{id}', [AdminController::class, 'EditCase'])->name('admin.EditCase');
            Route::post('/cases/{id}/update', [AdminController::class, 'updateCase'])->name('cases.update');
            Route::delete('/cases/{id}', [AdminController::class, 'delete'])->name('cases.delete');
            Route::get('/case/list', [AdminController::class, 'caselist'])->name('case.list');
        });
    });
});


Route::prefix('legaladvisor')->group(function () {
    Route::middleware('ladvisor')->group(function () {
        Route::prefix('dashboard')->group(function () {
            Route::get('/', [AuthController::class, 'ladvisord'])->name('ladvisord');
            Route::get('/profile', [AdvisorController::class, 'advisordProfile'])->name('advisord.profile');
            Route::put('/advisor/{id}', [AdvisorController::class, 'update'])->name('advisor.update');
            // Comment route section
            Route::get('/details/case/{id}', [AdvisorController::class, 'DatailsCase'])->name('advisor.DatailsCase');
            Route::post('/comment/store', [AdvisorController::class, 'Commentstore'])->name('advisor.comment');
        });
    });
});
