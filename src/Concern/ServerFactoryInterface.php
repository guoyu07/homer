<?php
namespace Lawoole\Homer\Concern;

interface ServerFactoryInterface
{
    /**
     * 获得 Swoole 服务
     *
     * @param array $config
     *
     * @return \Lawoole\Swoole\Server
     */
    public function getServer(array $config = []);
}
