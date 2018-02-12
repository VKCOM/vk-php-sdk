<?php

namespace VK\TransportClient;

interface TransportClient {
    /**
     * @param string $url
     * @param array|null $payload
     * @return mixed
     */
    public function post(string $url, ?array $payload = null);

    /**
     * @param string $url
     * @param array|null $payload
     * @return mixed
     */
    public function get(string $url, ?array $payload = null);

    /**
     * @param string $url
     * @param string $parameter_name
     * @param string $path
     * @return mixed
     */
    public function upload(string $url, string $parameter_name, string $path);
}
