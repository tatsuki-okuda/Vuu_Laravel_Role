<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\MenuController;
use App\Http\Controllers\InputController;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

// Route::middleware(['auth:sanctum', 'verified'])->get('/show', function () {
//     return Inertia::render('Show');
// })->name('show');
Route::middleware(['auth:sanctum', 'verified'])
    ->get('/show', [InputController::class, 'show'])
    ->name('input.show');

// Route::middleware(['auth:sanctum', 'verified'])->get('/edit', function () {
//     return Inertia::render('Edit');
// })->name('edit');
Route::middleware(['auth:sanctum', 'verified'])
    ->get('/edit', [InputController::class, 'edit'])
    ->name('input.edit');

// Route::get('menu', function () {
//         return Inertia::render('Menu');
//     })
//     ->name('menu')
//     ->middleware(['auth']);;

Route::get('menu', [MenuController::class, 'menu'])
    ->name('menu')
    ->middleware(['auth']);

    Route::get('secret', [MenuController::class, 'secret'])
    ->name('secret');