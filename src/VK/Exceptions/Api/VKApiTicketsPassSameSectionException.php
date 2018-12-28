<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiTicketsPassSameSectionException extends VKApiException {

	/**
	 * VKApiTicketsPassSameSectionException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(1505, 'You cannot pass the ticket to the same section, it is already there', $error);
	}
}
