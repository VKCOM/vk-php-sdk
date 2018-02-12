<?php

namespace VK\CallbackApi\Longpoll;

use VK\CallbackApi\CallbackApiHandler;
use VK\Exceptions\HttpRequestException;
use VK\Exceptions\VKClientException;
use VK\CallbackApi\Longpoll\Exceptions\LongPollServerKeyExpiredException;
use VK\CallbackApi\Longpoll\Exceptions\LongPollServerTsException;
use VK\Client\VKApiClient;
use VK\Exceptions\Api\VKApiException;
use VK\TransportClient\CurlHttpClient;
use VK\TransportClient\TransportClientResponse;

class CallbackApiLongPollExecutor {
    protected const API_PARAM_GROUP_ID = 'group_id';
    protected const API_PARAM_ACT = 'act';
    protected const API_PARAM_KEY = 'key';
    protected const API_PARAM_TS = 'ts';
    protected const API_PARAM_WAIT = 'wait';
    protected const VALUE_ACT = 'a_check';

    protected const EVENTS_FAILED = 'failed';
    protected const EVENTS_TIMESTAMP = 'timestamp';
    protected const EVENTS_UPDATES = 'updates';

    protected const EVENT_TYPE = 'type';
    protected const EVENT_OBJECT = 'object';

    protected const SERVER_TIMESTAMP = 'ts';
    protected const SERVER_URL = 'url';
    protected const SERVER_KEY = 'key';

    protected const ERROR_CODE_INCORRECT_TS_VALUE = 1;
    protected const ERROR_CODE_TOKEN_EXPIRED = 2;

    protected const CONNECTION_TIMEOUT = 10;
    protected const HTTP_STATUS_CODE_OK = 200;
    protected const DEFAULT_WAIT = 10;

    protected $api_client;
    protected $access_token;
    protected $group_id;
    protected $handler;
    protected $http_client;
    protected $server;
    protected $last_timestamp = null;
    protected $wait;

    /**
     * CallbackApiLongPollExecutor constructor.
     * @param VKApiClient $api_client
     * @param string $access_token
     * @param int $group_id
     * @param CallbackApiHandler $handler
     * @param int $wait
     */
    public function __construct(VKApiClient $api_client, string $access_token, int $group_id, CallbackApiHandler $handler,
                                int $wait = self::DEFAULT_WAIT) {
        $this->api_client = $api_client;
        $this->http_client = new CurlHttpClient(static::CONNECTION_TIMEOUT);
        $this->access_token = $access_token;
        $this->group_id = $group_id;
        $this->handler = $handler;
        $this->wait = $wait;
    }

    /**
     * Starts listening to LongPoll events.
     *
     * @param int|null $timestamp
     *
     * @return null
     * @throws LongPollServerTsException
     * @throws VKApiException
     * @throws VKClientException
     */
    public function listen(?int $timestamp = null) {
        if ($this->server === null) {
            $this->server = $this->getLongPollServer();
        }

        if ($this->last_timestamp === null) {
            $this->last_timestamp = $this->server[static::SERVER_TIMESTAMP];
        }

        if ($timestamp === null) {
            $timestamp = $this->last_timestamp;
        }

        try {
            $response = $this->getEvents($this->server[static::SERVER_URL], $this->server[static::SERVER_KEY], $timestamp);
            foreach ($response[static::EVENTS_UPDATES] as $event) {
                $this->handler->parseObject($this->group_id, null, $event[static::EVENT_TYPE], $event[static::EVENT_OBJECT]);
            }
            $this->last_timestamp = $response[static::EVENTS_TIMESTAMP];
        } catch (LongPollServerKeyExpiredException $e) {
            $this->server = $this->getLongPollServer();
        }

        return $this->last_timestamp;
    }

    /**
     * @return mixed
     * @throws VKApiException
     * @throws VKClientException
     */
    protected function getLongPollServer() {
        $params = array(
            static::API_PARAM_GROUP_ID => $this->group_id
        );

        $server = $this->api_client->groups()->getLongPollServer($this->access_token, $params);

        return array(
            static::SERVER_URL => $server['server'],
            static::SERVER_TIMESTAMP => $server['ts'],
            static::SERVER_KEY => $server['key'],
        );
    }

    /**
     * Retrieves events from long poll server starting from the specified timestamp.
     *
     * @param string $host
     * @param string $key
     * @param int $ts
     *
     * @return mixed
     * @throws LongPollServerKeyExpiredException
     * @throws LongPollServerTsException
     * @throws VKClientException
     */
    public function getEvents(string $host, string $key, int $ts) {
        $params = array(
            static::API_PARAM_KEY => $key,
            static::API_PARAM_TS => $ts,
            static::API_PARAM_WAIT => $this->wait,
            static::API_PARAM_ACT => static::VALUE_ACT
        );

        try {
            $response = $this->http_client->get($host, $params);
        } catch (HttpRequestException $e) {
            throw new VKClientException($e);
        }

        return $this->parseResponse($params, $response);
    }

    /**
     * Decodes the LongPoll response and checks its status code and whether it has a failed key.
     *
     * @param array $params
     * @param TransportClientResponse $response
     *
     * @return mixed
     *
     * @throws LongPollServerTsException
     * @throws LongPollServerKeyExpiredException
     * @throws VKClientException
     */
    private function parseResponse(array $params, TransportClientResponse $response) {
        $this->checkHttpStatus($response);

        $body = $response->getBody();
        $decode_body = $this->decodeBody($body);

        if (isset($decode_body[static::EVENTS_FAILED])) {
            switch ($decode_body[static::EVENTS_FAILED]) {
                case static::ERROR_CODE_INCORRECT_TS_VALUE:
                    $ts = $params[static::API_PARAM_TS];
                    $msg = '\'ts\' value is incorrect, minimal value is 1, maximal value is ' . $ts;
                    throw new LongPollServerTsException($msg);
                case static::ERROR_CODE_TOKEN_EXPIRED:
                    throw new LongPollServerKeyExpiredException('Try to generate a new key.');
                default:
                    throw new VKClientException('Unknown LongPollServer exception, something went wrong. ' . $decode_body);
            }
        }

        return $decode_body;
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
            throw new VKClientException('Invalid http status: ' . $response->getHttpStatus());
        }
    }
}
