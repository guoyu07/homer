<?php
namespace Homer\Rpc;

use Homer\Support\NodeInterface;

interface InvokerInterface extends NodeInterface
{
    /**
     * 获得调用接口类名
     *
     * @return string
     */
    public function getInterface();

    /**
     * 执行调用
     *
     * @param \Homer\Rpc\InvocationInterface $invocation
     *
     * @return \Homer\Rpc\ResultInterface
     */
    public function invoke(InvocationInterface $invocation);
}
