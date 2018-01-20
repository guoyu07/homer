<?php
namespace Lawoole\Homer\Transport;

use Throwable;

interface ChannelHandlerInterface
{
    /**
     * 连接连入时调用
     *
     * @param \Lawoole\Homer\Transport\ChannelInterface $channel
     */
    public function onConnect(ChannelInterface $channel);

    /**
     * 连接关闭时调用
     *
     * @param \Lawoole\Homer\Transport\ChannelInterface $channel
     */
    public function onClose(ChannelInterface $channel);

    /**
     * 发送数据完成时调用
     *
     * @param \Lawoole\Homer\Transport\ChannelInterface $channel
     * @param mixed $message
     */
    public function onSend(ChannelInterface $channel, $message);

    /**
     * 收到数据时调用
     *
     * @param \Lawoole\Homer\Transport\ChannelInterface $channel
     * @param mixed $message
     */
    public function onReceive(ChannelInterface $channel, $message);

    /**
     * 连接出现异常时调用
     *
     * @param \Lawoole\Homer\Transport\ChannelInterface $channel
     * @param \Throwable $throwable
     */
    public function onException(ChannelInterface $channel, Throwable $throwable);
}
