<?php
namespace Homer\Rpc;

use Closure;

interface MiddlewareInterface
{
    /**
     * 处理调用
     *
     * @param \Homer\Rpc\InvocationInterface $invocation
     * @param \Closure $next
     *
     * @return \Homer\Rpc\ResultInterface
     */
    public function handle(InvocationInterface $invocation, Closure $next);
}
