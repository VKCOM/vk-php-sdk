<?php

namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\VKClientException;
use VK\Exceptions\Api\VKApiException;

class Storage {

    /**
     * @var VKApiRequest
     **/
    private $request;

    /**
     * Storage constructor.
     * @param VKApiRequest $request
     */
    public function __construct(VKApiRequest $request) {
        $this->request = $request;
    }

    /**
     * Returns a value of variable with the name set by key parameter.
     * 
     * @param $access_token string
     * @param $params array
     *      - string key:
     *      - array keys:
     *      - integer user_id:
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function get(string $access_token, array $params = array()) {
        return $this->request->post('storage.get', $access_token, $params);
    }

    /**
     * Saves a value of variable with the name set by 'key' parameter.
     * 
     * @param $access_token string
     * @param $params array
     *      - string key:
     *      - string value:
     *      - integer user_id:
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function set(string $access_token, array $params = array()) {
        return $this->request->post('storage.set', $access_token, $params);
    }

    /**
     * Returns the names of all variables.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer user_id: user id, whose variables names are returned if they were requested with a server
     *        method.
     *      - integer count: amount of variable names the info needs to be collected from.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getKeys(string $access_token, array $params = array()) {
        return $this->request->post('storage.getKeys', $access_token, $params);
    }
}
