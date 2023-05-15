<?php

namespace VK\Client;

class VKApiError
{
    protected const ERROR_CODE = 'error_code';
    protected const ERROR_MSG = 'error_msg';
    protected const CAPTCHA_SID = 'captcha_sid';
    protected const CAPTCHA_IMG = 'captcha_img';
    protected const CONFIRMATION_TEXT = 'confirmation_text';
    protected const REDIRECT_URI = 'redirect_uri';
    protected const REQUEST_PARAMS = 'request_params';

    /**
     * @var int|null
     */
    protected ?int $error_code = null;

    /**
     * @var string|null
     */
    protected ?string $error_msg = null;

    /**
     * @var string|null
     */
    protected ?string $captcha_sid = null;

    /**
     * @var string|null
     */
    protected ?string $captcha_img = null;

    /**
     * @var string|null
     */
    protected ?string $confirmation_text = null;

    /**
     * @var string|null
     */
    protected ?string $redirect_uri = null;

    /**
     * @var array<array-key, mixed>|null
     */
    protected ?array $request_params = null;

    /**
     * VKApiError constructor.
     * @param array<array-key, mixed> $error
     */
    public function __construct(array $error)
    {
        if (array_key_exists(static::ERROR_CODE, $error)) {
            $this->error_code = (int)$error[static::ERROR_CODE];
        }

        if (array_key_exists(static::ERROR_MSG, $error)) {
            $this->error_msg = (string)$error[static::ERROR_MSG];
        }

        if (array_key_exists(self::CAPTCHA_SID, $error)) {
            $this->captcha_sid = (string)$error[static::CAPTCHA_SID];
        }

        if (array_key_exists(static::CAPTCHA_IMG, $error)) {
            $this->captcha_img = (string)$error[static::CAPTCHA_IMG];
        }

        if (array_key_exists(static::CONFIRMATION_TEXT, $error)) {
            $this->confirmation_text = (string)$error[static::CONFIRMATION_TEXT];
        }

        if (array_key_exists(static::REDIRECT_URI, $error)) {
            $this->redirect_uri = (string)$error[static::REDIRECT_URI];
        }

        if (array_key_exists(static::REQUEST_PARAMS, $error)) {
            $this->request_params = (array)$error[static::REQUEST_PARAMS];
        }
    }

    /**
     * Error code
     *
     * @return int|null
     */
    public function getErrorCode(): ?int
    {
        return $this->error_code;
    }

    /**
     * Error message
     *
     * @return string|null
     */
    public function getErrorMsg(): ?string
    {
        return $this->error_msg;
    }

    /**
     * Captcha SID
     *
     * @return string|null
     */
    public function getCaptchaSid(): ?string
    {
        return $this->captcha_sid;
    }

    /**
     * Captcha image url
     *
     * @return string|null
     */
    public function getCaptchaImg(): ?string
    {
        return $this->captcha_img;
    }

    /**
     * Confirmation text
     *
     * @return string|null
     */
    public function getConfirmationText(): ?string
    {
        return $this->confirmation_text;
    }

    /**
     * Redirect URI
     *
     * @return string|null
     */
    public function getRedirectUri(): ?string
    {
        return $this->redirect_uri;
    }

    /**
     * Request params
     *
     * @return array|null
     */
    public function getRequestParams(): ?array
    {
        return $this->request_params;
    }

}
