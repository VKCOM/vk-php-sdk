<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiPollsAccessWithoutVoteException extends VKApiException {

	/**
	 * VKApiPollsAccessWithoutVoteException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(253, 'Access denied, please vote first', $error);
	}
}
