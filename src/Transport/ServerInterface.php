<?php
namespace Lawoole\Homer\Transport;

interface ServerInterface
{
    /**
     * 判断服务器已经绑定端口
     *
     * @return bool
     */
    public function isServing();


}
