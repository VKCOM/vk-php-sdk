<?php

namespace VK\Exceptions\Api;

class VKApiException extends \Exception
{
    /**
     * @var int
     */
    protected $error_code;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $error_message;

    /**
     * VKApiException constructor.
     * @param int $error_code
     * @param string $description
     * @param string $error_message
     */
    public function __construct(int $error_code, string $description, string $error_message) {
        $this->error_code = $error_code;
        $this->description = $description;
        $this->error_message = $error_message;
    }

    /**
     * @return int
     */
    public function getErrorCode(): int {
        return $this->error_code;
    }

    /**
     * @return string
     */
    public function getDescription(): string {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getErrorMessage(): string {
        return $this->error_message;
    }


}
