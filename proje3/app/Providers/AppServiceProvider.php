<?php

namespace App\Providers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Blade;
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
        //TODO: özelliştirilmiş drictive oluşturabiliriz
        // blade put methodu için bir directive oluşturduk
        Blade::directive('mymethod', function ($val = null) {
            $val = str_replace("'", '', $val);
            $input = '<input type="hidden" name="_method" value="' . $val . '">';
            return $input;
        });

        Blade::directive('myif', function ($route = null) {
            if ($route) {
                return '<?php if(' . $route . ') { ?>';
            }
        });
        Blade::directive('myelse', function ($route = null) {
            if ($route) {
                return '<?php  else { ?>';
            }
        });
        Blade::directive('myendif', function ($route = null) {
            if ($route) {
                return '<?php  }  ?>';
            }
        });
    }
}
