<?php

namespace VK\TransportClient;

interface TransportClient {

    /**
     * Makes post request.
     *
     * @param string $url
     * @param array|null $payload
     *
     * @return TransportClientResponse
     * @throws TransportRequestException
     */
    public function post(string $url, ?array $payload = null): TransportClientResponse;

    /**
     * Makes get request.
     *
     * @param string $url
     * @param array|null $payload
     *
     * @return TransportClientResponse
     * @throws TransportRequestException
     */
    public function get(string $url, ?array $payload = null): TransportClientResponse;

    /**
     * Makes upload request.
     *
     * @param string $url
     * @param string $parameter_name
     * @param string $path
     *
     * @return TransportClientResponse
     * @throws TransportRequestException
     */
    public function upload(string $url, string $parameter_name, string $path): TransportClientResponse;
}
