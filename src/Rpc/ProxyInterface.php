<?php
namespace Homer\Rpc;

interface ProxyInterface
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
}
