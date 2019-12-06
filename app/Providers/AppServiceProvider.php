<?php
# @Date:   2019-10-22T15:38:38+01:00
# @Last modified time: 2019-10-23T11:24:21+01:00




namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
  Schema::defaultStringLength(191);
  }
}
