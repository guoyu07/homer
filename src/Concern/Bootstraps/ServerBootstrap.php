<?php
namespace Lawoole\Homer\Concern\Bootstraps;

use Illuminate\Contracts\Container\Container;
use Illuminate\Support\Arr;
use Lawoole\Homer\Concern\BootstrapInterface;
use Lawoole\Homer\Concern\ServerFactory;
use Lawoole\Homer\Support\Constants;

class ServerBootstrap implements BootstrapInterface
{
    /**
     * 执行初始化
     *
     * @param \Illuminate\Contracts\Container\Container $container
     * @param array $config
     */
    public function bootstrap(Container $container, array $config)
    {
        $this->registerServer($container, $config);
    }

    /**
     * 注册服务
     *
     * @param \Illuminate\Contracts\Container\Container $container
     * @param array $config
     */
    protected function registerServer(Container $container, array $config)
    {
        if ($container->bound(Constants::CONTAINER_SERVER_ID)) {
            return;
        }

        $serverConfig = Arr::get($config, 'server', []);

        $container->singleton(Constants::CONTAINER_SERVER_ID, function ($container) use ($serverConfig) {
            $factory = $container->make(ServerFactory::class);

            return $factory->getServer($serverConfig);
        });
    }
}
