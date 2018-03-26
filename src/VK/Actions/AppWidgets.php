<?php

namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

class AppWidgets {

    /**
     * @var VKApiRequest
     */
    private $request;

    /**
     * Widgets constructor.
     * @param VKApiRequest $request
     */
    public function __construct(VKApiRequest $request) {
        $this->request = $request;
    }

    /**
     * Update community app widget. [vk.com/dev/appWidgets.update|AppWidgets update].
     *
     * Access rights required: app_widget. [vk.com/dev/permissions|Access Permissions for Community Token].
     *
     * @param $access_token string
     * @param $params array
     *      - string code:
     *      - string type:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function update(string $access_token, array $params = array()) {
        return $this->request->post('appWidgets.update', $access_token, $params);
    }
}
