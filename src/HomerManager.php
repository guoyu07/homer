<?php
namespace Lawoole\Homer;

use Illuminate\Contracts\Container\Container;

class HomerManager
{
    /**
     * 容器对象
     *
     * @var \Illuminate\Contracts\Container\Container
     */
    protected $container;

    /**
     * 配置
     *
     * @var array
     */
    protected $config;

    /**
     * 创建 Homer 管理对象
     *
     * @param \Illuminate\Contracts\Container\Container $container
     * @param array $config
     */
    public function __construct(Container $container, array $config = [])
    {
        $this->container = $container;
        $this->config = $config;
    }

    /**
     * 启动 Homer
     */
    public function start()
    {
    }
}
