<?php
namespace Homer\Rpc;

interface InvocationInterface
{
    /**
     * 获得调用器
     *
     * @return \Homer\Rpc\InvokerInterface
     */
    public function getInvoker();

    /**
     * 获得调用接口类名
     *
     * @return string
     */
    public function getInterface();

    /**
     * 获得调用方法名
     *
     * @return string
     */
    public function getMethod();

    /**
     * 获得调用参数
     *
     * @return array
     */
    public function getArguments();

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
     * @param mixed $default
     *
     * @return mixed
     */
    public function getAttachment($key, $default = null);
}
