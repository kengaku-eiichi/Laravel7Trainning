<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Validator::extendImplicit('checkBadGuy', function ($attribute, $value, $parameters, $validator) {
            if (\Str::endsWith(request('email'), '@bad.guy') && ($value == '')) {
                return false;
            }

            return true;
        }, '悪人の方は、:attributeを必ず入力して下さい。');
    }
}
