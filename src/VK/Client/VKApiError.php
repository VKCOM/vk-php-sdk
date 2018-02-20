<?php

namespace VK\Client;

class VKApiError {
    protected const KEY_ERROR_CODE = 'error_code';
    protected const KEY_ERROR_MSG = 'error_msg';
    protected const KEY_CAPTCHA_SID = '$captcha_sid';
    protected const KEY_CAPTCHA_IMG = '$captcha_img';
    protected const KEY_CONFIRMATION_TEXT = '$confirmation_text';
    protected const KEY_REDIRECT_URI = '$redirect_uri';
    protected const KEY_REQUEST_PARAMS = '$request_params';

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
        $this->error_code = isset($error[static::KEY_ERROR_CODE]) ? $error[static::KEY_ERROR_CODE] : null;
        $this->error_msg = isset($error[static::KEY_ERROR_MSG]) ? $error[static::KEY_ERROR_MSG] : null;
        $this->captcha_sid = isset($error[static::KEY_CAPTCHA_SID]) ? $error[static::KEY_CAPTCHA_SID] : null;
        $this->captcha_img = isset($error[static::KEY_CAPTCHA_IMG]) ? $error[static::KEY_CAPTCHA_IMG] : null;
        $this->confirmation_text = isset($error[static::KEY_CONFIRMATION_TEXT]) ? $error[static::KEY_CONFIRMATION_TEXT] : null;
        $this->redirect_uri = isset($error[static::KEY_REDIRECT_URI]) ? $error[static::KEY_REDIRECT_URI] : null;
        $this->request_params = isset($error[static::KEY_REQUEST_PARAMS]) ? $error[static::KEY_REQUEST_PARAMS] : null;
    }

    /**
     * @return mixed|null
     */
    public function getErrorCode() {
        return $this->error_code;
    }

    /**
     * @return mixed|null
     */
    public function getErrorMsg() {
        return $this->error_msg;
    }

    /**
     * @return mixed|null
     */
    public function getCaptchaSid() {
        return $this->captcha_sid;
    }

    /**
     * @return mixed|null
     */
    public function getCaptchaImg() {
        return $this->captcha_img;
    }

    /**
     * @return mixed|null
     */
    public function getConfirmationText() {
        return $this->confirmation_text;
    }

    /**
     * @return mixed|null
     */
    public function getRedirectUri() {
        return $this->redirect_uri;
    }

    /**
     * @return mixed|null
     */
    public function getRequestParams() {
        return $this->request_params;
    }
}
