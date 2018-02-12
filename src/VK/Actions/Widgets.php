<?php

namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\VKClientException;
use VK\Exceptions\Api\VKApiException;

class Widgets {

    /**
     * @var VKApiRequest
     **/
    private $request;

    /**
     * Widgets constructor.
     * @param VKApiRequest $request
     */
    public function __construct(VKApiRequest $request) {
        $this->request = $request;
    }

    /**
     * Gets a list of comments for the page added through the [vk.com/dev/Comments|Comments widget].
     * 
     * @param $access_token string
     * @param $params array
     *      - integer widget_api_id:
     *      - string url:
     *      - string page_id:
     *      - string order:
     *      - array fields:
     *      - integer count:
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getComments(string $access_token, array $params = array()) {
        return $this->request->post('widgets.getComments', $access_token, $params);
    }

    /**
     * Gets a list of application/site pages where the [vk.com/dev/Comments|Comments widget] or [vk.com/dev/Like|Like
     * widget] is installed.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer widget_api_id:
     *      - string order:
     *      - string period:
     *      - integer count:
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getPages(string $access_token, array $params = array()) {
        return $this->request->post('widgets.getPages', $access_token, $params);
    }
}
