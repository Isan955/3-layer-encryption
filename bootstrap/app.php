<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
// 1. PENTING: Import middleware RaspMonitor di sini
use App\Http\Middleware\RaspMonitor; 

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        
        // Konfigurasi Spatie (yang lama)
        $middleware->alias([
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
        ]);

        // 2. PENTING: Tambahkan RaspMonitor di sini agar berjalan di setiap request
        $middleware->append(RaspMonitor::class);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();