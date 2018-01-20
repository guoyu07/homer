<?php
namespace Lawoole\Homer\Support;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use InvalidArgumentException;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\ErrorLogHandler;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SyslogHandler;
use Monolog\Logger as MonologLogger;
use Psr\Log\NullLogger;

class LoggerFactory
{
    /**
     * 日志级别映射
     *
     * @var array
     */
    protected $levels = [
        'debug'     => MonologLogger::DEBUG,
        'info'      => MonologLogger::INFO,
        'notice'    => MonologLogger::NOTICE,
        'warning'   => MonologLogger::WARNING,
        'error'     => MonologLogger::ERROR,
        'critical'  => MonologLogger::CRITICAL,
        'alert'     => MonologLogger::ALERT,
        'emergency' => MonologLogger::EMERGENCY,
    ];

    /**
     * 获得日志
     *
     * @param array $config
     *
     * @return \Psr\Log\LoggerInterface
     */
    public function getLogger(array $config = [])
    {
        // 没有定义处理器关键参数，就直接使用空日志，减少消耗
        if (!Arr::has($config, 'handler') || !Arr::has($config, 'configurator')) {
            return new NullLogger;
        }

        $logger = new MonologLogger($this->getName($config));

        // 配置
        $logger = $this->configureLogger($logger, $config);

        return $logger;
    }

    /**
     * 配置日志
     *
     * @param \Monolog\Logger $logger
     * @param array $config
     *
     * @return \Monolog\Logger
     */
    protected function configureLogger($logger, array $config)
    {
        // 存在配置方法，则调用配置方法进行配置
        if (($configurator = Arr::get($config, 'configurator')) && is_callable($configurator)) {
            return call_user_func($configurator, $logger, $config);
        }

        // 配置日志处理器
        if ($handler = Arr::get($config, 'handler')) {
            $this->{'configure'.Str::studly($handler).'Handler'}($logger);
        }

        return $logger;
    }

    /**
     * 配置文件日志处理器
     *
     * @param \Monolog\Logger $logger
     * @param array $config
     */
    protected function configureFileHandler($logger, array $config)
    {
        $handler = new StreamHandler($this->getLogPath($config), $this->getLogLevel($config));
        $handler->setFormatter($this->getDefaultFormatter());

        $logger->pushHandler($handler);
    }

    /**
     * 配置时间分割文件日志处理器
     *
     * @param \Monolog\Logger $logger
     * @param array $config
     */
    protected function configureDailyFileHandler($logger, array $config)
    {
        $maxFiles = Arr::get($config, 'max_files', Constants::DEFAULT_LOG_MAX_FILES);

        $handler = new RotatingFileHandler($this->getLogPath($config), $maxFiles, $this->getLogLevel($config));
        $handler->setFormatter($this->getDefaultFormatter());

        $logger->pushHandler($handler);
    }

    /**
     * 配置系统日志处理器
     *
     * @param \Monolog\Logger $logger
     * @param array $config
     */
    protected function configureSystemLogHandler($logger, array $config)
    {
        $handler = new SyslogHandler($this->getName($config), LOG_USER, $this->getLogLevel($config));

        $logger->pushHandler($handler);
    }

    /**
     * 配置标准错误日志处理器
     *
     * @param \Monolog\Logger $logger
     * @param array $config
     */
    protected function configureErrorLogHandler($logger, array $config)
    {
        $handler = new ErrorLogHandler(ErrorLogHandler::OPERATING_SYSTEM, $this->getLogLevel($config));

        $logger->pushHandler($handler);
    }

    /**
     * 获得默认的日志格式化工具
     *
     * @return \Monolog\Formatter\FormatterInterface
     */
    protected function getDefaultFormatter()
    {
        $formatter = new LineFormatter(null, null, true, true);

        // 错误包含栈信息
        $formatter->includeStacktraces();

        return $formatter;
    }

    /**
     * 获得日志名
     *
     * @param array $config
     *
     * @return string
     */
    protected function getName(array $config)
    {
        return Arr::get($config, 'name', Constants::HOMER);
    }

    /**
     * 获得日志文件路径
     *
     * @param array $config
     *
     * @return string
     */
    protected function getLogPath(array $config)
    {
        return Arr::get($config, 'path', function () use ($config) {
            return __DIR__.'/../../'.$this->getName($config).'.log';
        });
    }

    /**
     * 获得日志级别
     *
     * @param array $config
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     */
    protected function getLogLevel(array $config)
    {
        $level = Arr::get($config, 'level', Constants::DEFAULT_LOG_LEVEL);

        if (isset($this->levels[$level])) {
            return $this->levels[$level];
        }

        throw new InvalidArgumentException('Log level is invalid.');
    }
}
