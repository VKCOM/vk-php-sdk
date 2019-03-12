<?php

namespace VK\Client;

use VK\Exceptions\Api\ExceptionMapper;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;
use VK\TransportClient\Curl\CurlHttpClient;
use VK\TransportClient\TransportClientResponse;
use VK\TransportClient\TransportRequestException;

class VKApiRequest {
    private const PARAM_VERSION = 'v';
    private const PARAM_ACCESS_TOKEN = 'access_token';
    private const PARAM_LANG = 'lang';

    private const KEY_ERROR = 'error';
    private const KEY_RESPONSE = 'response';

    protected const CONNECTION_TIMEOUT = 10;
    protected const HTTP_STATUS_CODE_OK = 200;

    /**
     * @var string
     */
    private $host;

    /**
     * @var CurlHttpClient
     */
    private $http_client;

    /**
     * @var string
     */
    private $version;

    /**
     * @var string|null
     */
    private $language;

    /**
     * VKApiRequest constructor.
     * @param string $api_version
     * @param string|null $language
     * @param string $host
     */
    public function __construct(string $api_version, ?string $language, string $host) {
        $this->http_client = new CurlHttpClient(static::CONNECTION_TIMEOUT);
        $this->version = $api_version;
        $this->host = $host;
        $this->language = $language;
    }

    /**
     * Makes post request.
     *
     * @param string $method
     * @param string $access_token
     * @param array $params
     *
     * @return mixed
     *
     * @throws VKClientException
     * @throws VKApiException
     */
    public function post(string $method, string $access_token, array $params = array()) {
        $params = $this->formatParams($params);
        $params[static::PARAM_ACCESS_TOKEN] = $access_token;

        if (!isset($params[static::PARAM_VERSION])) {
            $params[static::PARAM_VERSION] = $this->version;
        }

        if ($this->language && !isset($params[static::PARAM_LANG])) {
            $params[static::PARAM_LANG] = $this->language;
        }

        $url = $this->host . '/' . $method;

        try {
            $response = $this->http_client->post($url, $params);
        } catch (TransportRequestException $e) {
            throw new VKClientException($e);
        }

        return $this->parseResponse($response);
    }

    /**
     * Uploads data by its path to the given url.
     *
     * @param string $upload_url
     * @param string $parameter_name
     * @param string $path
     *
     * @return mixed
     *
     * @throws VKClientException
     * @throws VKApiException
     */
    public function upload(string $upload_url, string $parameter_name, string $path) {
        try {
            $response = $this->http_client->upload($upload_url, $parameter_name, $path);
        } catch (TransportRequestException $e) {
            throw new VKClientException($e);
        }

        return $this->parseResponse($response);
    }

    /**
     * Decodes the response and checks its status code and whether it has an Api error. Returns decoded response.
     *
     * @param TransportClientResponse $response
     *
     * @return mixed
     *
     * @throws VKApiException
     * @throws VKClientException
     */
    private function parseResponse(TransportClientResponse $response) {
        $this->checkHttpStatus($response);

        $body = $response->getBody();
        $decode_body = $this->decodeBody($body);

        if (isset($decode_body[static::KEY_ERROR])) {
            $error = $decode_body[static::KEY_ERROR];
            $api_error = new VKApiError($error);
            throw ExceptionMapper::parse($api_error);
        }

        if (isset($decode_body[static::KEY_RESPONSE])) {
            return $decode_body[static::KEY_RESPONSE];
        } else {
            return $decode_body;
        }
    }

    /**
     * Formats given array of parameters for making the request.
     *
     * @param array $params
     *
     * @return array
     */
    private function formatParams(array $params) {
        foreach ($params as $key => $value) {
            if (is_array($value)) {
                $params[$key] = implode(',', $value);
            } else if (is_bool($value)) {
                $params[$key] = $value ? 1 : 0;
            }
        }
        return $params;
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
    protected function checkHttpStatus(TransportClientResponse $response): void {
        if ((int)$response->getHttpStatus() !== static::HTTP_STATUS_CODE_OK) {
            throw new VKClientException("Invalid http status: {$response->getHttpStatus()}");
        }
    }
}
