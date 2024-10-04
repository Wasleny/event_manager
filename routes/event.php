<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::resource('evento', EventController::class)->except(['index', 'show'])->middleware('auth');
Route::get('/evento', [EventController::class, 'index'])->name('evento.index');
Route::get('/evento/{event}', [EventController::class, 'show'])->name('evento.show');
Route::get('/meus-eventos', [EventController::class, 'getMyEvents'])->name('evento.meus-eventos');
Route::post('/evento/inscricao/{event}', [EventController::class, 'registerToEvent'])->name('evento.inscricao');
Route::delete('/evento/cancelar-inscricao/{event}', [EventController::class, 'destroyEventRegistration'])->name('evento.cancelar-inscricao');
