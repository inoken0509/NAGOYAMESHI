<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ReservationController;
use App\Models\Company;

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

Auth::routes(['verify' => true]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/company', function () {
    return view('company.index', [
        'company' => Company::first()
    ]);
})->name('company');

Route::resource('restaurants', RestaurantController::class)->only(['index', 'show']);

Route::middleware('verified')->group(function () {
    Route::resource('restaurants.reviews', ReviewController::class)->only('create', 'store', 'edit', 'update', 'destroy');
    Route::resource('restaurants.reservations', ReservationController::class)->only(['create', 'store']);
    Route::resource('reservations', ReservationController::class)->only(['index', 'destroy']);
    Route::get('/mypage', function () {
        return view('mypage.index');
    })->name('mypage');
});

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    Route::get('login', [Dashboard\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [Dashboard\Auth\LoginController::class, 'login'])->name('login');
    Route::post('logout', [Dashboard\Auth\LoginController::class, 'logout'])->name('logout');
    Route::get('/', [Dashboard\HomeController::class, 'index'])->name('home');
});

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => 'admin.auth'], function () {
    Route::get('users', [Dashboard\UserController::class, 'index'])->name('users.index');
    Route::get('users/{user}', [Dashboard\UserController::class, 'show'])->name('users.show');
    Route::resource('restaurants', Dashboard\RestaurantController::class);
    Route::resource('categories', Dashboard\CategoryController::class)->except('show', 'create');
    Route::resource('companies', Dashboard\CompanyController::class)->only(['index', 'edit', 'update']);
});
