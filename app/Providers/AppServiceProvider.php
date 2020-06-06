<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Blade;

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
        //default string length ... 
        Schema::defaultStringLength(191);
        //custom directive ...
        Blade::directive('current_time', function(){
            return "<?php echo date('d/m/y, H:i:s'); ?>";
        });
    }
}
