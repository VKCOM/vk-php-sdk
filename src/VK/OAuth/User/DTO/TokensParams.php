<?php

declare(strict_types=1);

namespace VK\OAuth\User\DTO;

class TokensParams
{
    /** grant type value */
    public const GRANT_TYPE = 'authorization_code';

    /** param names */
    private const PARAM_GRANT_TYPE = 'grant_type';
    private const PARAM_CLIENT_ID = 'client_id';
    private const PARAM_CODE_VERIFIER = 'code_verifier';
    private const PARAM_REDIRECT_URI = 'redirect_uri';
    private const PARAM_AUTHORIZATION_CODE = 'code';
    private const PARAM_DEVICE_ID = 'device_id';
    private const PARAM_SERVICE_TOKEN = 'service_token';
    private const PARAM_IP_ADDRESS = 'ip';
    private const PARAM_VIEW_TYPE = 'view_type';

    /**
     * @var int
     */
    private int $client_id;

    /**
     * @var string
     */
    private string $code_verifier;

    /**
     * @var string
     */
    private string $redirect_uri;

    /**
     * @var string
     */
    private string $code;

    /**
     * @var string
     */
    private string $device_id;

    /**
     * @var string
     */
    private string $service_token = '';

    /**
     * @var string
     */
    private string $ip = '';

    /**
     * @var string
     */
    private string $view_type = ViewType::VIEW_TYPE_RFC;

    /**
     * @param int    $client_id
     * @param string $code_verifier
     * @param string $redirect_uri
     * @param string $code
     * @param string $device_id
     */
    public function __construct(int $client_id, string $code_verifier, string $redirect_uri, string $code, string $device_id)
    {
        $this->client_id = $client_id;
        $this->code_verifier = $code_verifier;
        $this->redirect_uri = $redirect_uri;
        $this->code = $code;
        $this->device_id = $device_id;
    }

    /**
     * @return string
     */
    public function getServiceToken(): string
    {
        return $this->service_token;
    }

    /**
     * @param string $service_token
     * @return $this
     */
    public function setServiceToken(string $service_token): self
    {
        $this->service_token = $service_token;
        return $this;
    }

    /**
     * @return string
     */
    public function getIp(): string
    {
        return $this->ip;
    }

    /**
     * @param string $ip
     * @return $this
     */
    public function setIp(string $ip): self
    {
        $this->ip = $ip;
        return $this;
    }

    /**
     * @return string
     */
    public function getViewType(): string
    {
        return $this->view_type;
    }

    /**
     * @param string $view_type
     * @return $this
     */
    public function setViewType(string $view_type): self
    {
        $this->view_type = $view_type;
        return $this;
    }

    /**
     * @return int
     */
    public function getClientId(): int
    {
        return $this->client_id;
    }

    /**
     * @return string
     */
    public function getCodeVerifier(): string
    {
        return $this->code_verifier;
    }

    /**
     * @return string
     */
    public function getRedirectUri(): string
    {
        return $this->redirect_uri;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getDeviceId(): string
    {
        return $this->device_id;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $params = [
            self::PARAM_GRANT_TYPE => self::GRANT_TYPE,
            self::PARAM_CLIENT_ID => $this->client_id,
            self::PARAM_CODE_VERIFIER => $this->code_verifier,
            self::PARAM_REDIRECT_URI => $this->redirect_uri,
            self::PARAM_AUTHORIZATION_CODE => $this->code,
            self::PARAM_DEVICE_ID => $this->device_id,
        ];

        if ($this->service_token) {
            $params[self::PARAM_SERVICE_TOKEN] = $this->service_token;
        }

        if ($this->ip) {
            $params[self::PARAM_IP_ADDRESS] = $this->ip;
        }

        if ($this->view_type != ViewType::VIEW_TYPE_RFC) {
            $params[self::PARAM_VIEW_TYPE] = $this->view_type;
        }

        return $params;
    }
}
