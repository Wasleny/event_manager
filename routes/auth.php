<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordLinkController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;


Route::get('/cadastro', [RegisterController::class, 'create']);
Route::post('/cadastro', [RegisterController::class, 'store'])->name('cadastro');

Route::get('/acesso', [LoginController::class, 'create']);
Route::post('/acesso', [LoginController::class, 'store'])->name('acesso');

Route::post('/sair', [LogoutController::class, 'destroy'])->name('sair')->middleware('auth');

Route::get('/link-redefinir-senha', [ForgotPasswordLinkController::class, 'create'])->name('redefinir-senha');
Route::post('/redefinir-senha', [ForgotPasswordLinkController::class, 'store'])->middleware('guest')->name('password.email');
Route::get('/redefinir-senha/{token}', [ForgotPasswordController::class, 'create'])->middleware('guest')->name('password.reset');
Route::post('/redefinir-senha/{token}', [ForgotPasswordController::class, 'reset'])->middleware('guest')->name('password.update');
