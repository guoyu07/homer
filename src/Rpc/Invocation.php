<?php
namespace Lawoole\Homer\Rpc;

class Invocation implements InvocationInterface
{
    /**
     * 调用接口名
     *
     * @var string
     */
    protected $interface;

    /**
     * 调用方法名
     *
     * @var string
     */
    protected $method;

    /**
     * 调用参数
     *
     * @var array
     */
    protected $arguments;

    /**
     * 附加信息
     *
     * @var array
     */
    protected $attachments;

    /**
     * 新建调用对象实例
     *
     * @param string $interface
     * @param string $method
     * @param array $arguments
     * @param array $attributes
     */
    public function __construct($interface, $method, array $arguments = [], array $attributes = [])
    {
        $this->interface = $interface;
        $this->method    = $method;
        $this->arguments = $arguments;

        $this->setArguments($attributes);
    }

    /**
     * 设置调用的接口名
     *
     * @param string $interface
     */
    public function setInterface($interface)
    {
        $this->interface = $interface;
    }

    /**
     * 获得调用接口类名
     *
     * @return string
     */
    public function getInterface()
    {
        return $this->interface;
    }

    /**
     * 设置调用方法名
     *
     * @param string $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * 获得调用方法名
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * 设置调用参数
     *
     * @param array $arguments
     */
    public function setArguments(array $arguments)
    {
        $this->arguments = $arguments;
    }

    /**
     * 获得调用参数
     *
     * @return array
     */
    public function getArguments()
    {
        return $this->arguments;
    }

    /**
     * 设置附加信息
     *
     * @param array $attachments
     */
    public function setAttachments(array $attachments)
    {
        $this->attachments = [];

        foreach ($attachments as $key => $value) {
            $this->setAttachment($key, $value);
        }
    }

    /**
     * 设置附加信息
     *
     * @param string $key
     * @param string $value
     */
    public function setAttachment($key, $value)
    {
        if ($value === null) {
            unset($this->attachments[$key]);
        } elseif (is_bool($value)) {
            $this->attachments[$key] = $value ? 'true' : 'false';
        } else {
            $this->attachments[$key] = (string) $value;
        }
    }

    /**
     * 获得附加信息
     *
     * @return array
     */
    public function getAttachments()
    {
        return $this->attachments;
    }

    /**
     * 获得附加信息
     *
     * @param string $key
     * @param mixed $default
     *
     * @return string
     */
    public function getAttachment($key, $default = null)
    {
        return isset($this->attachments[$key]) ? $this->attachments[$key] : $default;
    }
}
