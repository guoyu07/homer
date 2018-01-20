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
     * Homer 配置
     *
     * @var array
     */
    protected $config;

    /**
     * 是否已经初始化
     *
     * @var bool
     */
    protected $bootstrapped = false;

    /**
     * 初始化列表
     *
     * @var array
     */
    protected $bootstraps = [
        Concern\Bootstraps\LogBootstrap::class
    ];

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
     * 执行初始化
     */
    protected function bootstrap()
    {
        if ($this->bootstrapped) {
            return;
        }

        $this->bootstrapped = true;

        foreach ($this->bootstraps as $bootstrap) {
            // 实例化初始化过程
            $bootstrap = $this->container->make($bootstrap);

            $bootstrap->bootstrap($this->container, $this->config);
        }
    }

    /**
     *
     */
    public function prepare()
    {

    }

    /**
     *
     */
    public function serve()
    {

    }
}
