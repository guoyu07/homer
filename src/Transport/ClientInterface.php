<?php
namespace Lawoole\Homer\Transport;

interface ClientInterface
{
    /**
     * 重新连接服务器
     */
    public function reconnect();
}
