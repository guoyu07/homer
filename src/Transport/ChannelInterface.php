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


    public function isConnected();
}
