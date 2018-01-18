<?php
namespace Lawoole\Homer\Transport;

use Throwable;

interface ChannelHandlerInterface
{
    /**
     * 传输通道连入时调用
     *
     * @param \Lawoole\Homer\Transport\ChannelInterface $channel
     */
    public function onConnect(ChannelInterface $channel);

    /**
     * 传输通道关闭时调用
     *
     * @param \Lawoole\Homer\Transport\ChannelInterface $channel
     */
    public function onClose(ChannelInterface $channel);

    /**
     * 向输通道中收到数据时调用
     *
     * @param \Lawoole\Homer\Transport\ChannelInterface $channel
     * @param mixed $message
     */
    public function onSend(ChannelInterface $channel, $message);

    /**
     * 从传输通道中收到数据时调用
     *
     * @param \Lawoole\Homer\Transport\ChannelInterface $channel
     * @param mixed $message
     */
    public function onReceive(ChannelInterface $channel, $message);

    /**
     * 传输通道内出现异常时调用
     *
     * @param \Lawoole\Homer\Transport\ChannelInterface $channel
     * @param \Throwable $throwable
     */
    public function onException(ChannelInterface $channel, Throwable $throwable);
}
