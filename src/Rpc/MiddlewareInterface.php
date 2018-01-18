<?php
namespace Lawoole\Homer\Rpc;

use Closure;

interface MiddlewareInterface
{
    /**
     * 处理调用
     *
     * @param \Lawoole\Homer\Rpc\InvocationInterface $invocation
     * @param \Closure $next
     *
     * @return \Lawoole\Homer\Rpc\ResultInterface
     */
    public function handle(InvocationInterface $invocation, Closure $next);
}
