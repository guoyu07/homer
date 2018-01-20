<?php
namespace Lawoole\Homer\Rpc;

interface ResultInterface
{
    /**
     * 获得调用结果值
     *
     * @return mixed
     */
    public function getValue();

    /**
     * 获得调用异常
     *
     * @return \Throwable
     */
    public function getException();

    /**
     * 判断否存在异常
     *
     * @return bool
     */
    public function hasException();

    /**
     * 恢复调用结果
     *
     * @return mixed
     *
     * @throws \Throwable
     */
    public function recover();

    /**
     * 获得附加信息
     *
     * @return array
     */
    public function getAttachments();

    /**
     * 获得附加信息
     *
     * @param string $key
     * @param string $default
     *
     * @return string
     */
    public function getAttachment($key, $default = null);
}
