<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Paginator::useBootstrap();
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
    }
}
