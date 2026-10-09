<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\ProfilSekolah;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::share('profil', ProfilSekolah::first());
    }
}
