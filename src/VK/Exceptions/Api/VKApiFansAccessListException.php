<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiFansAccessListException extends VKApiException {

	/**
	 * VKApiFansAccessListException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(240, 'Access to subscriptions or followers list denied', $error);
	}
}
