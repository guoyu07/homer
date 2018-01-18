<?php
namespace Lawoole\Homer\Support;

interface NodeInterface
{
    /**
     * 获得 Url
     *
     * @return \Lawoole\Homer\Support\Url
     */
    public function getUrl();

    /**
     * 执行销毁
     */
    public function destroy();
}
