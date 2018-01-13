<?php
namespace Homer\Support;

interface NodeInterface
{
    /**
     * 获得 Url
     *
     * @return \Homer\Support\Url
     */
    public function getUrl();

    /**
     * 执行销毁
     */
    public function destroy();
}
