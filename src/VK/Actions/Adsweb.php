<?php

namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\VKClientException;
use VK\Exceptions\VKApiException;

class Adsweb {

    /**
     * @var VKApiRequest
     */
    private $request;

    /**
     * Adsweb constructor.
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
     *      - integer office_id:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function getAdCategories(string $access_token, array $params = array()) {
        return $this->request->post('adsweb.getAdCategories', $access_token, $params);
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
    public function getAdUnitCode(string $access_token, array $params = array()) {
        return $this->request->post('adsweb.getAdUnitCode', $access_token, $params);
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *      - integer office_id:
     *      - string sites_ids:
     *      - string ad_units_ids:
     *      - string fields:
     *      - integer limit:
     *      - integer offset:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function getAdUnits(string $access_token, array $params = array()) {
        return $this->request->post('adsweb.getAdUnits', $access_token, $params);
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *      - integer office_id:
     *      - string sites_ids:
     *      - integer limit:
     *      - integer offset:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function getFraudHistory(string $access_token, array $params = array()) {
        return $this->request->post('adsweb.getFraudHistory', $access_token, $params);
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *      - integer office_id:
     *      - string sites_ids:
     *      - string fields:
     *      - integer limit:
     *      - integer offset:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function getSites(string $access_token, array $params = array()) {
        return $this->request->post('adsweb.getSites', $access_token, $params);
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *      - integer office_id:
     *      - string ids_type:
     *      - string ids:
     *      - string period:
     *      - string date_from:
     *      - string date_to:
     *      - string fields:
     *      - integer limit:
     *      - string page_id:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function getStatistics(string $access_token, array $params = array()) {
        return $this->request->post('adsweb.getStatistics', $access_token, $params);
    }
}
