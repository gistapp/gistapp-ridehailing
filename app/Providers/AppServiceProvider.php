<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
 public function boot()
 {
    \URL::forceRootUrl(\Config::get('app.url'));    
    if (str_contains(\Config::get('app.url'), 'https://')) {
        \URL::forceScheme('https');
    }
 }
