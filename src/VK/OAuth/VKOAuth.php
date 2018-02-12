<?php

namespace VK\OAuth;

use VK\Exceptions\HttpRequestException;
use VK\Exceptions\VKClientException;
use VK\Exceptions\VKOAuthException;
use VK\OAuth\Enums\OAuthResponseType;
use VK\TransportClient\CurlHttpClient;
use VK\TransportClient\TransportClientResponse;

class VKOAuth {
    protected const OAUTH_VERSION = '5.69';

    protected const OAUTH_PARAM_VERSION = 'v';
    protected const OAUTH_PARAM_CLIENT_ID = 'client_id';
    protected const OAUTH_PARAM_REDIRECT_URI = 'redirect_uri';
    protected const OAUTH_PARAM_GROUP_IDS = 'group_ids';
    protected const OAUTH_PARAM_DISPLAY = 'display';
    protected const OAUTH_PARAM_SCOPE = 'scope';
    protected const OAUTH_PARAM_RESPONSE_TYPE = 'response_type';
    protected const OAUTH_PARAM_STATE = 'state';
    protected const OAUTH_PARAM_CLIENT_SECRET = 'client_secret';
    protected const OAUTH_PARAM_CODE = 'code';
    protected const OAUTH_PARAM_REVOKE = 'revoke';

    protected const RESPONSE_KEY_ERROR = 'error';
    protected const RESPONSE_KEY_ERROR_DESCRIPTION = 'error_description';
    protected const RESPONSE_KEY_ACCESS_TOKEN = 'access_token';

    protected const OAUTH_HOST = 'https://oauth.vk.com';
    protected const OAUTH_ENDPOINT_AUTHORIZE = '/authorize';
    protected const OAUTH_ENDPOINT_ACCESS_TOKEN = '/access_token';

    protected const CONNECTION_TIMEOUT = 10;
    protected const HTTP_STATUS_CODE_OK = 200;

    protected $http_client;
    protected $version;
    protected $url_authorize;
    protected $url_access_token;

    /**
     * VKOAuth constructor.
     *
     * @param string $version
     * @param string $url_authorize
     * @param string $url_access_token
     */
    public function __construct(string $version = self::OAUTH_VERSION, string $url_authorize = self::OAUTH_HOST . self::OAUTH_ENDPOINT_AUTHORIZE,
                                string $url_access_token = self::OAUTH_HOST . self::OAUTH_ENDPOINT_ACCESS_TOKEN) {
        $this->http_client = new CurlHttpClient(static::CONNECTION_TIMEOUT);
        $this->version = $version;
        $this->url_authorize = $url_authorize;
        $this->url_access_token = $url_access_token;
    }

    /**
     * Opens the authorization dialog.
     *
     * @param string $response_type.
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
     * @see OAuthResponseType
     * @see OAuthDisplay
     * @see OAuthGroupScope
     * @see OAuthUserScope
     */
    public function authorize(string $response_type, int $client_id, string $redirect_uri, string $display,
                              ?array $scope = null, ?string $state = null, ?array $group_ids = null, bool $revoke = false) {
        $scope_mask = 0;
        foreach ($scope as $scope_setting) {
            $scope_mask |= $scope_setting;
        }

        $params = array(
            static::OAUTH_PARAM_CLIENT_ID => $client_id,
            static::OAUTH_PARAM_REDIRECT_URI => $redirect_uri,
            static::OAUTH_PARAM_DISPLAY => $display,
            static::OAUTH_PARAM_SCOPE => $scope_mask,
            static::OAUTH_PARAM_STATE => $state,
            static::OAUTH_PARAM_RESPONSE_TYPE => $response_type,
            static::OAUTH_PARAM_VERSION => $this->version
        );

        if ($group_ids) {
            $params[static::OAUTH_PARAM_GROUP_IDS] = implode(',', $group_ids);
        }

        if ($revoke) {
          $params[static::OAUTH_PARAM_REVOKE] = 1;
        }

        try {
            $response = $this->http_client->post($this->url_access_token, $params);
        } catch (HttpRequestException $e) {
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
