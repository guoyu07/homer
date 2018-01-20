<?php
namespace Lawoole\Homer\Concern;

use Illuminate\Support\Arr;
use Lawoole\Homer\Support\Constants;
use Lawoole\Swoole\Server;

class ServerFactory implements ServerFactoryInterface
{
    /**
     * 获得 Swoole 服务
     *
     * @param array $config
     *
     * @return \Lawoole\Swoole\Server
     */
    public function getServer(array $config = [])
    {
        $server = new Server;

        $this->initServerWithConfig($server, $config);

        return $server;
    }

    /**
     * 初始化服务器
     *
     * @param \Lawoole\Swoole\Server $server
     * @param array $config
     */
    protected function initServerWithConfig(Server $server, array $config)
    {
        // 一些默认的值
        $options = [
            'dispatch_mode'    => 2,
            'open_tcp_nodelay' => true,
            'tcp_fastopen'     => true,
        ];

        $options = $options + Arr::get($config, 'options', []);

        $cpuNum = swoole_cpu_num();

        $options['reactor_num'] = Arr::get($config, 'reactors', $cpuNum);
        $options['worker_num'] = Arr::get($config, 'dispatchers', $cpuNum);
        $options['task_worker_num'] = Arr::get($config, 'task_worker_num', Constants::DEFAULT_SERVER_WORKERS);
        $options['task_max_request'] = Arr::get($config, 'max_request', Constants::DEFAULT_MAX_REQUEST);

        $server->setOptions($options);
    }
}
