<?php

namespace VK\Client;

class VKApiError {

    protected const KEY_ERROR_CODE = 'error_code';
    protected const KEY_ERROR_MSG = 'error_msg';
    protected const KEY_CAPTCHA_SID = 'captcha_sid';
    protected const KEY_CAPTCHA_IMG = 'captcha_img';
    protected const KEY_CONFIRMATION_TEXT = 'confirmation_text';
    protected const KEY_REDIRECT_URI = 'redirect_uri';
    protected const KEY_REQUEST_PARAMS = 'request_params';

    protected $error_code;
    protected $error_msg;
    protected $captcha_sid;
    protected $captcha_img;
    protected $confirmation_text;
    protected $redirect_uri;
    protected $request_params;

    /**
     * VKApiError constructor.
     * @param array $error
     */
    public function __construct(array $error) {
        $this->error_code = isset($error[static::KEY_ERROR_CODE]) ? intval($error[static::KEY_ERROR_CODE]) : null;
        $this->error_msg = isset($error[static::KEY_ERROR_MSG]) ? strval($error[static::KEY_ERROR_MSG]) : null;
        $this->captcha_sid = isset($error[static::KEY_CAPTCHA_SID]) ? strval($error[static::KEY_CAPTCHA_SID]) : null;
        $this->captcha_img = isset($error[static::KEY_CAPTCHA_IMG]) ? strval($error[static::KEY_CAPTCHA_IMG]) : null;
        $this->confirmation_text = isset($error[static::KEY_CONFIRMATION_TEXT]) ? strval($error[static::KEY_CONFIRMATION_TEXT]) : null;
        $this->redirect_uri = isset($error[static::KEY_REDIRECT_URI]) ? strval($error[static::KEY_REDIRECT_URI]) : null;
        $this->request_params = isset($error[static::KEY_REQUEST_PARAMS]) ? ((array)$error[static::KEY_REQUEST_PARAMS]) : null;
    }

    /**
     * Error code
     *
     * @return int|null
     */
    public function getErrorCode(): ?int {
        return $this->error_code;
    }

    /**
     * Error message
     *
     * @return string|null
     */
    public function getErrorMsg(): ?string {
        return $this->error_msg;
    }

    /**
     * Captcha SID
     *
     * @return string|null
     */
    public function getCaptchaSid(): ?string {
        return $this->captcha_sid;
    }

    /**
     * Captcha image url
     *
     * @return string|null
     */
    public function getCaptchaImg(): ?string {
        return $this->captcha_img;
    }

    /**
     * Confirmation text
     *
     * @return string|null
     */
    public function getConfirmationText(): ?string {
        return $this->confirmation_text;
    }

    /**
     * Redirect URI
     *
     * @return string|null
     */
    public function getRedirectUri(): ?string {
        return $this->redirect_uri;
    }

    /**
     * Request params
     *
     * @return array|null
     */
    public function getRequestParams(): ?array {
        return $this->request_params;
    }


}
