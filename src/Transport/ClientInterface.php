<?php
namespace Lawoole\Homer\Transport;

interface ClientInterface extends EndpointInterface, ChannelInterface
{
    /**
     * 重新连接服务器
     */
    public function reconnect();
}
