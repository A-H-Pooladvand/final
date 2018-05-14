<?php

namespace App\Providers;

use Blade;
use Illuminate\Support\ServiceProvider;
use Schema;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('_layouts.front.includes.header', 'App\Http\ViewComposers\Front\ActiveMenuComposer');
        View::composer('_layouts.admin.includes.sidebar', 'App\Http\ViewComposers\Menu\Admin\Render');

        Blade::directive('script', function ($expression) {
            return "<?php \$__env->startPush('page-scripts'); ?>
                    <script src=\"<?php echo e(asset(\"assets/{$expression}\")); ?>\"></script>
                    <?php \$__env->stopPush(); ?>";
        });

        Blade::directive('style', function ($expression) {
            return "<?php \$__env->startPush('page-styles'); ?>
                    <link rel=\"stylesheet\" href=\"<?php echo e(asset(\"assets/{$expression}\")); ?>\"></script>
                    <?php \$__env->stopPush(); ?>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (config('app.env') != "local")
        {
            $this->app->bind('path.public', function () {
                return base_path('../berenjkar.zeitoon.org');
                    #base_path('public_html');
            });
        }
    }
}
