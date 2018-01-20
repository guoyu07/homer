<?php
namespace Lawoole\Homer\Concern;

use Illuminate\Contracts\Container\Container;

interface BootstrapInterface
{
    /**
     * 执行初始化
     *
     * @param \Illuminate\Contracts\Container\Container $container
     * @param array $config
     */
    public function bootstrap(Container $container, array $config);
}
