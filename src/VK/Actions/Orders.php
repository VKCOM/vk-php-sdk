<?php

namespace VK\Actions;

use VK\Client\Actions\ActionInterface;
use VK\Client\VKApiRequest;
use VK\Enums\OrdersChangeStateAction;
use VK\Exceptions\Api\VKApiActionFailedException;
use VK\Exceptions\Api\VKApiAppsSubscriptionInvalidStatusException;
use VK\Exceptions\Api\VKApiAppsSubscriptionNotFoundException;
use VK\Exceptions\Api\VKApiLimitsException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

class Orders implements ActionInterface
{
	/** @param VKApiRequest $request */
	private VKApiRequest $request;


	/**
	 * Orders constructor.
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request)
	{
		$this->request = $request;
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer user_id
	 * - @var integer subscription_id
	 * - @var boolean pending_cancel
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAppsSubscriptionNotFoundException Subscription not found
	 * @throws VKApiAppsSubscriptionInvalidStatusException Subscription is in invalid status
	 */
	public function cancelSubscription(string $access_token, array $params = [])
	{
		return $this->request->post('orders.cancelSubscription', $access_token, $params);
	}


	/**
	 * Changes order status.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer order_id: order ID.
	 * - @var OrdersChangeStateAction action: action to be done with the order. Available actions: *cancel - to cancel unconfirmed order. *charge - to confirm unconfirmed order. Applies only if processing of [vk.com/dev/payments_status|order_change_state] notification failed. *refund - to cancel confirmed order.
	 * - @var integer app_order_id: internal ID of the order in the application.
	 * - @var boolean test_mode: if this parameter is set to 1, this method returns a list of test mode orders. By default - 0.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiLimitsException Out of limits
	 * @throws VKApiActionFailedException Unable to process action
	 */
	public function changeState(string $access_token, array $params = [])
	{
		return $this->request->post('orders.changeState', $access_token, $params);
	}


	/**
	 * Returns a list of orders.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer offset
	 * - @var integer count: number of returned orders.
	 * - @var boolean test_mode: if this parameter is set to 1, this method returns a list of test mode orders. By default - 0.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function get(string $access_token, array $params = [])
	{
		return $this->request->post('orders.get', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer user_id
	 * - @var array[string] votes
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getAmount(string $access_token, array $params = [])
	{
		return $this->request->post('orders.getAmount', $access_token, $params);
	}


	/**
	 * Returns information about orders by their IDs.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer order_id: order ID.
	 * - @var array[integer] order_ids: order IDs (when information about several orders is requested).
	 * - @var boolean test_mode: if this parameter is set to 1, this method returns a list of test mode orders. By default - 0.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getById(string $access_token, array $params = [])
	{
		return $this->request->post('orders.getById', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer user_id
	 * - @var integer subscription_id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAppsSubscriptionNotFoundException Subscription not found
	 */
	public function getUserSubscriptionById(string $access_token, array $params = [])
	{
		return $this->request->post('orders.getUserSubscriptionById', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer user_id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getUserSubscriptions(string $access_token, array $params = [])
	{
		return $this->request->post('orders.getUserSubscriptions', $access_token, $params);
	}
}

