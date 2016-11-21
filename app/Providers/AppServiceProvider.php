<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\View\Directives\PageHeaderDirective;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootCustomBladeDirectives();
    }

    /**
     * Boot custom blade directives.
     */
    protected function bootCustomBladeDirectives()
    {

        Blade::directive('pageHeader', function ($expression) {
            return "<?php echo app('App\\View\\Directives\\PageHeaderDirective')->handle({$expression}); ?>";
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton(PageHeaderDirective::class, PageHeaderDirective::class);
    }
}
