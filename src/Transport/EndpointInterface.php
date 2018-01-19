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

    /**
     * 发送消息
     *
     * @param string $message
     * @param bool $noWait
     */
    public function send($message, $noWait = false);

    /**
     * 判断端点是否已经关闭
     *
     * @return bool
     */
    public function isClosed();

    /**
     * 关闭端点
     */
    public function close();
}
