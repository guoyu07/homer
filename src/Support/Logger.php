<?php
namespace Lawoole\Homer\Support;

use Psr\Log\LoggerInterface;

class Logger
{
    /**
     * 绑定的日志实例
     *
     * @var \Psr\Log\LoggerInterface
     */
    protected static $logger;

    /**
     * 设置全局日志代理实例
     *
     * @param \Psr\Log\LoggerInterface $logger
     */
    public static function setLogger(LoggerInterface $logger)
    {
        static::$logger = $logger;
    }

    /**
     * 记录系统崩溃日志
     *
     * @param string $message
     * @param array $context
     */
    public static function emergency($message, array $context = [])
    {
        if (static::$logger) {
            static::$logger->emergency($message, $context);
        }
    }

    /**
     * 记录紧急事件日志
     *
     * 例如: 无法进入系统，数据库无法连接等
     *
     * @param string $message
     * @param array $context
     */
    public static function alert($message, array $context = [])
    {
        if (static::$logger) {
            static::$logger->alert($message, $context);
        }
    }

    /**
     * 记录严重错误日志
     *
     * 例如: 部分模块无法使用，出现未知异常等
     *
     * @param string $message
     * @param array $context
     */
    public static function critical($message, array $context = [])
    {
        if (static::$logger) {
            static::$logger->critical($message, $context);
        }
    }

    /**
     * 记录运行错误日志
     *
     * @param string $message
     * @param array $context
     */
    public static function error($message, array $context = [])
    {
        if (static::$logger) {
            static::$logger->error($message, $context);
        }
    }

    /**
     * 记录警告日志
     *
     * 例子: 使用了已弃用的接口，接口权限不足等
     *
     * @param string $message
     * @param array $context
     */
    public static function warning($message, array $context = [])
    {
        if (static::$logger) {
            static::$logger->warning($message, $context);
        }
    }

    /**
     * 记录提醒日志
     *
     * @param string $message
     * @param array $context
     */
    public static function notice($message, array $context = [])
    {
        if (static::$logger) {
            static::$logger->notice($message, $context);
        }
    }

    /**
     * 记录事件日志
     *
     * 例如: 用户登录记录，执行 SQL 记录
     *
     * @param string $message
     * @param array $context
     */
    public static function info($message, array $context = [])
    {
        if (static::$logger) {
            static::$logger->info($message, $context);
        }
    }

    /**
     * 记录调试信息日志
     *
     * @param string $message
     * @param array $context
     */
    public static function debug($message, array $context = [])
    {
        if (static::$logger) {
            static::$logger->debug($message, $context);
        }
    }

    /**
     * 记录日志
     *
     * @param mixed $level
     * @param string $message
     * @param array $context
     */
    public static function log($level, $message, array $context = [])
    {
        if (static::$logger) {
            static::$logger->log($level, $message, $context);
        }
    }
}
