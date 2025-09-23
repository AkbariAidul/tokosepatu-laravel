<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // <-- Import View
use App\Models\Kategori; // <-- Import Kategori

class AppServiceProvider extends ServiceProvider
{
    // ...

    public function boot(): void
    {
        // Berbagi data kategori dengan semua view
        View::composer('*', function ($view) {
            $view->with('kategoris', Kategori::all());
        });
    }
}