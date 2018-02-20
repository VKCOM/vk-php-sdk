<?php

namespace VK\OAuth;

use VK\Exceptions\VKClientException;
use VK\Exceptions\VKOAuthException;
use VK\TransportClient\Curl\CurlHttpClient;
use VK\TransportClient\TransportClientResponse;
use VK\TransportClient\TransportRequestException;

class VKOAuth {
    protected const VERSION = '5.69';

    private const PARAM_VERSION = 'v';
    private const PARAM_CLIENT_ID = 'client_id';
    private const PARAM_REDIRECT_URI = 'redirect_uri';
    private const PARAM_GROUP_IDS = 'group_ids';
    private const PARAM_DISPLAY = 'display';
    private const PARAM_SCOPE = 'scope';
    private const PARAM_RESPONSE_TYPE = 'response_type';
    private const PARAM_STATE = 'state';
    private const PARAM_CLIENT_SECRET = 'client_secret';
    private const PARAM_CODE = 'code';
    private const PARAM_REVOKE = 'revoke';

    private const RESPONSE_KEY_ERROR = 'error';
    private const RESPONSE_KEY_ERROR_DESCRIPTION = 'error_description';
    private const RESPONSE_KEY_ACCESS_TOKEN = 'access_token';

    protected const HOST = 'https://oauth.vk.com';
    private const ENDPOINT_AUTHORIZE = '/authorize';
    private const ENDPOINT_ACCESS_TOKEN = '/access_token';

    protected const CONNECTION_TIMEOUT = 10;
    protected const HTTP_STATUS_CODE_OK = 200;

    /**
     * @var CurlHttpClient
     */
    private $http_client;

    /**
     * @var string
     */
    private $version;

    /**
     * @var string
     */
    private $host;

    /**
     * VKOAuth constructor.
     *
     * @param string $version
     */
    public function __construct(string $version = self::VERSION) {
        $this->http_client = new CurlHttpClient(static::CONNECTION_TIMEOUT);
        $this->version = $version;
        $this->host = self::HOST;
    }

    /**
     * Opens the authorization dialog.
     *
     * @param string $response_type
     * @param int $client_id
     * @param string $redirect_uri
     * @param string $display
     * @param int[] $scope
     * @param string $state
     * @param int[] $group_ids
     * @param bool $revoke
     * @return mixed
     * @throws VKClientException
     * @throws VKOAuthException
     * @see VKOAuthResponseType
     * @see VKOAuthDisplay
     * @see VKOAuthGroupScope
     * @see VKOAuthUserScope
     */
    public function authorize(string $response_type, int $client_id, string $redirect_uri, string $display,
                              ?array $scope = null, ?string $state = null, ?array $group_ids = null, bool $revoke = false) {
        $scope_mask = 0;
        foreach ($scope as $scope_setting) {
            $scope_mask |= $scope_setting;
        }

        $params = array(
            static::PARAM_CLIENT_ID     => $client_id,
            static::PARAM_REDIRECT_URI  => $redirect_uri,
            static::PARAM_DISPLAY       => $display,
            static::PARAM_SCOPE         => $scope_mask,
            static::PARAM_STATE         => $state,
            static::PARAM_RESPONSE_TYPE => $response_type,
            static::PARAM_VERSION       => $this->version,
        );

        if ($group_ids) {
            $params[static::PARAM_GROUP_IDS] = implode(',', $group_ids);
        }

        if ($revoke) {
            $params[static::PARAM_REVOKE] = 1;
        }

        try {
            $response = $this->http_client->post($this->host . self::ENDPOINT_AUTHORIZE, $params);
        } catch (TransportRequestException $e) {
            throw new VKClientException($e);
        }

        return $this->checkOAuthResponse($response);
    }

    /**
     * @param int $client_id
     * @param string $client_secret
     * @param string $redirect_uri
     * @param string $code
     * @return mixed
     * @throws VKClientException
     * @throws VKOAuthException
     */
    public function getAccessToken(int $client_id, string $client_secret, string $redirect_uri, string $code) {
        $params = array(
            static::PARAM_CLIENT_ID     => $client_id,
            static::PARAM_CLIENT_SECRET => $client_secret,
            static::PARAM_REDIRECT_URI  => $redirect_uri,
            static::PARAM_CODE          => $code,
        );

        try {
            $response = $this->http_client->get($this->host . self::ENDPOINT_ACCESS_TOKEN, $params);
        } catch (TransportRequestException $e) {
            throw new VKClientException($e);
        }

        return $this->checkOAuthResponse($response);
    }

    /**
     * Decodes the authorization response and checks its status code and whether it has an error.
     *
     * @param TransportClientResponse $response
     *
     * @return mixed
     *
     * @throws VKClientException
     * @throws VKOAuthException
     */
    protected function checkOAuthResponse(TransportClientResponse $response) {
        $this->checkHttpStatus($response);

        $body = $response->getBody();
        $decode_body = $this->decodeBody($body);

        if (isset($decode_body[static::RESPONSE_KEY_ERROR])) {
            throw new VKOAuthException("{$decode_body[static::RESPONSE_KEY_ERROR_DESCRIPTION]}. OAuth error {$decode_body[static::RESPONSE_KEY_ERROR]}");
        }

        if (isset($decode_body[static::RESPONSE_KEY_ACCESS_TOKEN])) {
            return $decode_body[static::RESPONSE_KEY_ACCESS_TOKEN];
        } else {
            return $decode_body;
        }
    }

    /**
     * Decodes body.
     *
     * @param string $body
     *
     * @return mixed
     */
    protected function decodeBody(string $body) {
        $decoded_body = json_decode($body, true);

        if ($decoded_body === null || !is_array($decoded_body)) {
            $decoded_body = [];
        }

        return $decoded_body;
    }

    /**
     * @param TransportClientResponse $response
     *
     * @throws VKClientException
     */
    protected function checkHttpStatus(TransportClientResponse $response) {
        if ($response->getHttpStatus() != static::HTTP_STATUS_CODE_OK) {
            throw new VKClientException("Invalid http status: {$response->getHttpStatus()}");
        }
    }
}
