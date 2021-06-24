<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

use Laravel\Jetstream\Http\Controllers\Inertia\UserProfileController;
use Laravel\Fortify\Http\Controllers\ProfileInformationController;

use App\Http\Controllers\MenuController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\Auth\LoginController;

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


Route::prefix('admin')->group(function () {
    Route::get('login', [LoginController::class, 'create'])->name('admin.login');
    Route::post('login', [LoginController::class, 'store']);

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
                ->name('admin.dashboard');;
        Route::get('/profile', [AdminProfileController::class, 'show'])
                ->name('admin_profile.show');

        if (Features::enabled(Features::updateProfileInformation())) {
            Route::put('/profile-information', [ProfileInformationController::class, 'update'])
                ->name('admin-profile-information.update');
        }
    });
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');



Route::middleware(['auth:sanctum', 'verified'])
    ->get('/show', [InputController::class, 'show'])
    ->name('input.show');
Route::middleware(['auth:sanctum', 'verified'])
    ->get('/edit', [InputController::class, 'edit'])
    ->name('input.edit');

Route::get('menu', [MenuController::class, 'menu'])
    ->name('menu')
    ->middleware(['auth']);
Route::get('secret', [MenuController::class, 'secret'])
->name('secret');



Route::resource('/task', TaskController::class)
->names(['index'=>'task.index',
        'create' => 'task.create',
        'edit' => 'task.edit',
        'update' => 'task.update',
        'destroy' => 'task.destroy',
        'store'=>'task.store'])
->middleware(['auth']);
