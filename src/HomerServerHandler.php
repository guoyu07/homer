<?php
namespace Lawoole\Homer;

use Lawoole\Server\ServerHandler;

class HomerServerHandler extends ServerHandler
{
    /**
     * 在服务即将启动时调用
     *
     * @param \Lawoole\Swoole\Server $server
     */
    public function onLaunch($server)
    {
        parent::onLaunch($server);

        // 启动 Homer
        $this->app['homer']->start();
    }
}
