<?php

namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\VKClientException;
use VK\Exceptions\Api\VKApiException;
use VK\Actions\Enums\OrdersChangeStateAction;

class Orders {

    /**
     * @var VKApiRequest
     **/
    private $request;

    /**
     * Orders constructor.
     * @param VKApiRequest $request
     */
    public function __construct(VKApiRequest $request) {
        $this->request = $request;
    }

    /**
     * Returns a list of orders.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer count: number of returned orders.
     *      - boolean test_mode: if this parameter is set to 1, this method returns a list of test mode orders. By
     *        default — 0.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function get(string $access_token, array $params = array()) {
        return $this->request->post('orders.get', $access_token, $params);
    }

    /**
     * Returns information about orders by their IDs.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer order_id: order ID.
     *      - array order_ids: order IDs (when information about several orders is requested).
     *      - boolean test_mode: if this parameter is set to 1, this method returns a list of test mode orders. By
     *        default — 0.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getById(string $access_token, array $params = array()) {
        return $this->request->post('orders.getById', $access_token, $params);
    }

    /**
     * Changes order status.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer order_id: order ID.
     *      - OrdersChangeStateAction action: action to be done with the order. Available actions: *cancel — to
     *        cancel unconfirmed order. *charge — to confirm unconfirmed order. Applies only if processing of
     *        [vk.com/dev/payments_status|order_change_state] notification failed. *refund — to cancel confirmed order.
     *        @see OrdersChangeStateAction
     *      - integer app_order_id: internal ID of the order in the application.
     *      - boolean test_mode: if this parameter is set to 1, this method returns a list of test mode orders. By
     *        default — 0.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function changeState(string $access_token, array $params = array()) {
        return $this->request->post('orders.changeState', $access_token, $params);
    }

    /**
     * 
     * 
     * @param $access_token string
     * @param $params array
     *      - integer user_id:
     *      - array votes:
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getAmount(string $access_token, array $params = array()) {
        return $this->request->post('orders.getAmount', $access_token, $params);
    }
}
