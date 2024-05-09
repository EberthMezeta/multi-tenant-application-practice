<?php

declare(strict_types=1);

use App\Http\Controllers\AuthTenantController;
use App\Http\Controllers\ProductoController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\RedirectIfAuthenticatedToRoot;
use App\Models\Producto;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    'universal',

])->group(function () {

    Route::get('/login', [AuthTenantController::class, 'showLoginForm'])->name('tenant.login');
    Route::post('/login', [AuthTenantController::class, 'login']);

    Route::get('/register', [AuthTenantController::class, 'showRegistrationForm'])->name('tenant.register');
    Route::post('/register', [AuthTenantController::class, 'register']);
});

Route::middleware([
    'web',
    'auth', // Middleware 'auth' para proteger la ruta específica
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,

])->group(function () {
    Route::get('/', [ProductoController::class, 'create'])->name('tenant.list');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

