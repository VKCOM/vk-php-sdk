<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAccessMenuException extends VKApiException {

	/**
	 * VKApiAccessMenuException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(148, 'Access to the menu of the user denied', $error);
	}
}
