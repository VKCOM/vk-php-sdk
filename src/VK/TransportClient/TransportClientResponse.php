<?php

namespace VK\TransportClient;

class TransportClientResponse {
    private $http_status;

    private $headers;

    private $body;

    /**
     * TransportClientResponse constructor.
     * @param int|null $http_status
     * @param array|null $headers
     * @param null|string $body
     */
    public function __construct(?int $http_status, ?array $headers, ?string $body) {
        $this->http_status = $http_status;
        $this->headers = $headers;
        $this->body = $body;
    }

    /**
     * @return mixed
     */
    public function getBody() {
        return $this->body;
    }

    /**
     * @return mixed
     */
    public function getHttpStatus() {
        return $this->http_status;
    }

    /**
     * @return mixed
     */
    public function getHeaders() {
        return $this->headers;
    }
}
