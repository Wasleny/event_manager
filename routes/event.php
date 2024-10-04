<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::resource('evento', EventController::class)->except('index')->middleware('auth');
Route::get('/evento', [EventController::class, 'index'])->name('evento.index');
Route::get('/meus-eventos', [EventController::class, 'getMyEvents'])->name('evento.meus-eventos');
Route::post('/evento/inscricao/{event}', [EventController::class, 'registerToEvent'])->name('evento.inscricao');
