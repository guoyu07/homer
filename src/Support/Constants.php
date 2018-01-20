<?php
namespace Lawoole\Homer\Support;

class Constants
{
    /**
     * Homer 名称
     */
    const HOMER = 'homer';

    /**
     * 日志容器注册名
     */
    const CONTAINER_LOG_ID = 'lawoole.homer.id';

    /**
     * 默认日志级别
     */
    const DEFAULT_LOG_LEVEL = 'debug';

    /**
     * 默认最大日志文件保留数量
     */
    const DEFAULT_LOG_MAX_FILES = 30;

    /**
     * 服务容器注册名
     */
    const CONTAINER_SERVER_ID = 'lawoole.homer.server';

    /**
     * 默认服务工作进程数
     */
    const DEFAULT_SERVER_WORKERS = 16;

    /**
     * 默认工作进程最大处理数
     */
    const DEFAULT_MAX_REQUEST = 5000;
}
