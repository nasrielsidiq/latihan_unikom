<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Paksa semua URL menggunakan HTTPS jika diakses lewat ngrok
        if (str_contains(request()->getHttpHost(), 'ngrok-free.app')) {
            URL::forceScheme('https');
        }
    }
}
