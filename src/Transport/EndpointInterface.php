<?php
namespace Lawoole\Homer\Transport;

interface EndpointInterface
{
    /**
     * 获得 Url
     *
     * @return \Lawoole\Homer\Support\Url
     */
    public function getUrl();

    /**
     * 获得本地 Socket 地址
     *
     * @return string
     */
    public function getLocalAddress();




    public function close();
}
