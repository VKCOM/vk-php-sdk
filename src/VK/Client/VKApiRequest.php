<?php

namespace VK\Client;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Utils;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use VK\Exceptions\Api\ExceptionMapper;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;
use VK\Transport\Client;

class VKApiRequest
{
    protected const PARAM_VERSION = 'v';
    protected const PARAM_ACCESS_TOKEN = 'access_token';
    protected const PARAM_LANG = 'lang';

    protected const KEY_ERROR = 'error';
    protected const KEY_RESPONSE = 'response';

    protected const CONNECTION_TIMEOUT = 10;
    protected const HTTP_STATUS_CODE_OK = 200;

    /**
     * @var string
     */
    protected string $host;

    /**
     * @var ClientInterface
     */
    protected ClientInterface $client;

    /**
     * @var string
     */
    protected string $version;

    /**
     * @var string|null
     */
    protected ?string $language;

    /**
     * VKApiRequest constructor.
     * @param string $api_version
     * @param string|null $language
     * @param string $host
     * @param ClientInterface|null $client
     */
    public function __construct(string $api_version, ?string $language, string $host, ?ClientInterface $client = null)
    {
        $this->version = $api_version;
        $this->host = $host;
        $this->language = $language;
        $this->client = $client ?: new Client([
            'base_uri' => $host,
            'timeout'  => static::CONNECTION_TIMEOUT,
        ]);
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
    public function post(string $method, string $access_token, array $params = array())
    {
        $params = $this->formatParams($params);
        $params[static::PARAM_ACCESS_TOKEN] = $access_token;

        if (!isset($params[static::PARAM_VERSION])) {
            $params[static::PARAM_VERSION] = $this->version;
        }

        if ($this->language && !isset($params[static::PARAM_LANG])) {
            $params[static::PARAM_LANG] = $this->language;
        }

        try {
            $response = $this->client->post("{$this->host}/{$method}?" . http_build_query($params));
        } catch (GuzzleException $exception) {
            throw new VKClientException($exception);
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
    public function upload(string $upload_url, string $parameter_name, string $path)
    {
        try {
            $response = $this->client->post($upload_url, [
                'multipart' => [
                    [
                        'name' => $parameter_name,
                        'contents' => Utils::tryFopen($path, 'rb'),
                    ],
                ],
            ]);
        } catch (GuzzleException $exception) {
            throw new VKClientException($exception);
        }

        return $this->parseResponse($response);
    }

    /**
     * Decodes the response and checks its status code and whether it has an Api error. Returns decoded response.
     *
     * @param ResponseInterface $response
     *
     * @return mixed
     *
     * @throws VKApiException
     * @throws VKClientException
     */
    private function parseResponse(ResponseInterface $response)
    {
        if ($response->getStatusCode() !== static::HTTP_STATUS_CODE_OK) {
            throw new VKClientException("Invalid http status: {$response->getStatusCode()}");
        }

        $body = $response->getBody()->getContents();
        $decode_body = $this->decodeBody($body);

        if (isset($decode_body[static::KEY_ERROR])) {
            $error = $decode_body[static::KEY_ERROR];
            $api_error = new VKApiError($error);
            throw ExceptionMapper::parse($api_error);
        }

        if (isset($decode_body[static::KEY_RESPONSE])) {
            return $decode_body[static::KEY_RESPONSE];
        }

        return $decode_body;
    }

    /**
     * Formats given array of parameters for making the request.
     *
     * @param array<array-key, mixed> $params
     *
     * @return array<array-key, mixed>
     */
    private function formatParams(array $params): array
    {
        foreach ($params as $key => $value) {
            if (is_array($value)) {
                $params[$key] = implode(',', $value);
            } elseif (is_bool($value)) {
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
    protected function decodeBody(string $body)
    {
        $decoded_body = json_decode($body, true);

        if (!is_array($decoded_body)) {
            $decoded_body = [];
        }

        return $decoded_body;
    }
}
