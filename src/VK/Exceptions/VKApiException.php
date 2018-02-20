<?php

namespace VK\Exceptions\Api;

class VKApiException extends \Exception
{
    protected $code;
    protected $description;
    protected $message;

    /**
     * VKApiException constructor.
     * @param int $code
     * @param string $description
     * @param string $message
     */
    public function __construct(int $code, string $description, string $message) {
        $this->code = $code;
        $this->description = $description;
        $this->message = $message;
    }
}
