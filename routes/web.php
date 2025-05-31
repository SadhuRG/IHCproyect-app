<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRole;
use App\Livewire\SuperAdminDashboard;
use App\Livewire\AdminDashboard;
use App\Livewire\ColaboradorDashboard;

Route::view('/', '/welcome');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth', 'verified'])->group(function () {
    // Ruta por defecto del dashboard
    Route::get('/welcome', function () {
        $user = auth()->user();

        if ($user->hasRole('superadministrador')) {
            return redirect()->route('superadmin');
        } elseif ($user->hasRole('administrador')) {
            return redirect()->route('admin');
        } elseif ($user->hasRole('colaborador')) {
            return redirect()->route('colaborador');
        }

        return view('welcome');
    })->name('welcome');

    // Rutas específicas para cada rol usando el middleware CheckRole directamente
    Route::get('/dashboard/superadmin', SuperAdminDashboard::class)
        ->middleware(CheckRole::class . ':superadministrador')
        ->name('superadmin');

    Route::get('/dashboard/admin', AdminDashboard::class)
        ->middleware(CheckRole::class . ':administrador')
        ->name('admin');

    Route::get('/dashboard/colaborador', ColaboradorDashboard::class)
        ->middleware(CheckRole::class . ':colaborador')
        ->name('colaborador');
});



require __DIR__.'/auth.php';
