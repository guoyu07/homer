<?php
namespace Lawoole\Homer;

use Illuminate\Support\ServiceProvider;

class HomerServiceProvider extends ServiceProvider
{
    /**
     * 注册服务
     */
    public function register()
    {
        $this->app->singleton('homer', function ($app) {
            return new HomerManager($app, $app['config']['homer']);
        });
    }
}
