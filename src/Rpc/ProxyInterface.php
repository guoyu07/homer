<?php
namespace Lawoole\Homer\Rpc;

interface ProxyInterface
{
    /**
     * 获得调用器
     *
     * @return \Lawoole\Homer\Rpc\InvokerInterface
     */
    public function getInvoker();

    /**
     * 获得调用接口类名
     *
     * @return string
     */
    public function getInterface();
}
