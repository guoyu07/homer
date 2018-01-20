<?php
namespace Lawoole\Homer\Concern\Bootstraps;

use Illuminate\Contracts\Container\Container;
use Illuminate\Support\Arr;
use Lawoole\Homer\Concern\BootstrapInterface;
use Lawoole\Homer\Support\Constants;
use Lawoole\Homer\Support\Logger;
use Lawoole\Homer\Support\LoggerFactory;

class LogBootstrap implements BootstrapInterface
{
    /**
     * 执行初始化
     *
     * @param \Illuminate\Contracts\Container\Container $container
     * @param array $config
     */
    public function bootstrap(Container $container, array $config)
    {
        $this->registerLogger($container, $config);

        // 绑定日志对象
        Logger::setLogger($container->make(Constants::CONTAINER_LOG_ID));
    }

    /**
     * 注册日志
     *
     * @param \Illuminate\Contracts\Container\Container $container
     * @param array $config
     */
    protected function registerLogger(Container $container, array $config)
    {
        if ($container->bound(Constants::CONTAINER_LOG_ID)) {
            return;
        }

        $logConfig = Arr::get($config, 'log', []);

        $container->singleton(Constants::CONTAINER_LOG_ID, function ($container) use ($logConfig) {
            $factory = $container->make(LoggerFactory::class);

            return $factory->getLogger($logConfig);
        });
    }
}
