<?php
namespace Lawoole\Homer\Rpc;

use Lawoole\Homer\Support\NodeInterface;

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
     * @param \Lawoole\Homer\Rpc\InvocationInterface $invocation
     *
     * @return \Lawoole\Homer\Rpc\ResultInterface
     */
    public function invoke(InvocationInterface $invocation);
}
