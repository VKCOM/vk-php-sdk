<?php

namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\VKClientException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\Api\undefined;

class PrettyCards {

    /**
     * @var VKApiRequest
     */
    private $request;

    /**
     * PrettyCards constructor.
     * @param VKApiRequest $request
     */
    public function __construct(VKApiRequest $request) {
        $this->request = $request;
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id:
     *      - string photo:
     *      - string title:
     *      - string link:
     *      - string price:
     *      - string price_old:
     *      - string button:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     *
     */
    public function create(string $access_token, array $params = array()) {
        return $this->request->post('prettyCards.create', $access_token, $params);
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id:
     *      - integer card_id:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     * @throws undefined
     *
     */
    public function delete(string $access_token, array $params = array()) {
        return $this->request->post('prettyCards.delete', $access_token, $params);
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id:
     *      - integer card_id:
     *      - string photo:
     *      - string title:
     *      - string link:
     *      - string price:
     *      - string price_old:
     *      - string button:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     *
     */
    public function edit(string $access_token, array $params = array()) {
        return $this->request->post('prettyCards.edit', $access_token, $params);
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id:
     *      - integer offset:
     *      - integer count:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function get(string $access_token, array $params = array()) {
        return $this->request->post('prettyCards.get', $access_token, $params);
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id:
     *      - array card_ids:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function getById(string $access_token, array $params = array()) {
        return $this->request->post('prettyCards.getById', $access_token, $params);
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function getUploadURL(string $access_token, array $params = array()) {
        return $this->request->post('prettyCards.getUploadURL', $access_token, $params);
    }
}
