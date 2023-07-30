<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlShortenerController;
use App\Http\Controllers\StatisticsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[UrlShortenerController::class, 'index'])->name('urlshortener.index');
Route::get('/createShortUrl',[UrlShortenerController::class, 'create'])->name('urlshortener.create');
Route::post('/store', [UrlShortenerController::class, 'store'])->name('urlshortener.store');
Route::get('/{shortUrl}', [UrlShortenerController::class, 'redirec'])->name('urlshortener.redirect');
Route::get('/{id}/Statistics', [StatisticsController::class, 'index'])->name('Statistics.index');

