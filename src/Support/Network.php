<?php
namespace Lawoole\Homer\Support;

class Network
{
    /**
     * 默认本地主机地址
     */
    const LOCAL_HOST = '127.0.0.1';

    /**
     * 默认任意主机地址
     */
    const ANY_HOST = '0.0.0.0';

    /**
     * 获得本地主机
     *
     * @return string
     */
    public static function getLocalHost()
    {
        if ($nets = swoole_get_local_ip()) {
            foreach ($nets as $net => $host) {
                if (self::isValidLocalHost($host)) {
                    return $host;
                }
            }
        }

        return self::LOCAL_HOST;
    }

    /**
     * 判断主机是否有效
     *
     * @param string $host
     *
     * @return bool
     */
    protected static function isValidLocalHost($host)
    {
        return $host && $host != self::LOCAL_HOST && $host != self::ANY_HOST;
    }
}
