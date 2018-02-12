<?php

namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\VKClientException;
use VK\Exceptions\Api\VKApiException;

class Search {

    /**
     * @var VKApiRequest
     **/
    private $request;

    /**
     * Search constructor.
     * @param VKApiRequest $request
     */
    public function __construct(VKApiRequest $request) {
        $this->request = $request;
    }

    /**
     * Allows the programmer to do a quick search for any substring.
     * 
     * @param $access_token string
     * @param $params array
     *      - string q: Search query string.
     *      - integer offset: Offset for querying specific result subset
     *      - integer limit: Maximum number of results to return.
     *      - array filters: 
     *      - boolean search_global: 
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getHints(string $access_token, array $params = array()) {
        return $this->request->post('search.getHints', $access_token, $params);
    }
}
