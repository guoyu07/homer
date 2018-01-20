<?php
namespace Lawoole\Homer\Rpc;

class Result implements ResultInterface
{
    /**
     * 调用结果值
     *
     * @var mixed
     */
    protected $value;

    /**
     * 调用异常
     *
     * @var \Throwable
     */
    protected $exception;

    /**
     * 附加信息
     *
     * @var array
     */
    protected $attachments;

    /**
     * 创建调用结果对象
     *
     * @param mixed $value
     * @param \Throwable $exception
     * @param array $attachments
     */
    public function __construct($value = null, $exception = null, array $attachments = [])
    {
        $this->value = $value;
        $this->exception = $exception;

    }

    /**
     * 设置调用结果值
     *
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * 获得调用结果值
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * 设置调用异常
     *
     * @param \Throwable $exception
     */
    public function setException($exception)
    {
        $this->exception = $exception;
    }

    /**
     * 获得调用异常
     *
     * @return \Throwable
     */
    public function getException()
    {
        return $this->exception;
    }

    /**
     * 判断否存在异常
     *
     * @return bool
     */
    public function hasException()
    {
        return $this->exception !== null;
    }

    /**
     * 恢复调用结果
     *
     * @return mixed
     *
     * @throws \Throwable
     */
    public function recover()
    {
        if ($this->exception) {
            throw $this->exception;
        }

        return $this->value;
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
     * @return mixed
     */
    public function getAttachment($key, $default = null)
    {
        return $this->attachments[$key] ?? $default;
    }
}
