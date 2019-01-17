<?php
namespace VK\Actions;

use VK\Actions\Enum\OrdersAction;
use VK\Client\VKApiRequest;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

/**
 */
class Orders {

	/**
	 * @var VKApiRequest
	 */
	private $request;

	/**
	 * Orders constructor.
	 *
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request) {
		$this->request = $request;
	}

	/**
	 * Changes order status.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer order_id: order ID.
	 * - @var OrdersAction action: action to be done with the order. Available actions: *cancel — to cancel unconfirmed order. *charge — to confirm unconfirmed order. Applies only if processing of [vk.com/dev/payments_status|order_change_state] notification failed. *refund — to cancel confirmed order.
	 * - @var integer app_order_id: internal ID of the order in the application.
	 * - @var boolean test_mode: if this parameter is set to 1, this method returns a list of test mode orders. By default — 0.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function changeState($access_token, array $params = []) {
		return $this->request->post('orders.changeState', $access_token, $params);
	}

	/**
	 * Returns a list of orders.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer count: number of returned orders.
	 * - @var boolean test_mode: if this parameter is set to 1, this method returns a list of test mode orders. By default — 0.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function get($access_token, array $params = []) {
		return $this->request->post('orders.get', $access_token, $params);
	}

	/**
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer user_id
	 * - @var array[string] votes
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getAmount($access_token, array $params = []) {
		return $this->request->post('orders.getAmount', $access_token, $params);
	}

	/**
	 * Returns information about orders by their IDs.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer order_id: order ID.
	 * - @var array[integer] order_ids: order IDs (when information about several orders is requested).
	 * - @var boolean test_mode: if this parameter is set to 1, this method returns a list of test mode orders. By default — 0.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getById($access_token, array $params = []) {
		return $this->request->post('orders.getById', $access_token, $params);
	}
}
