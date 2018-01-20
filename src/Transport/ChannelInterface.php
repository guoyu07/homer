<?php
namespace Lawoole\Homer\Transport;

interface ChannelInterface extends EndpointInterface
{
    /**
     * 获得远端 Socket 地址
     *
     * @return string
     */
    public function getRemoteAddress();

    /**
     * 判断连接是否已经建立
     *
     * @return bool
     */
    public function isConnected();
}
