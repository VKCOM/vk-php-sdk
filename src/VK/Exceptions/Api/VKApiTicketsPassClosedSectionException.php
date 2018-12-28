<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiTicketsPassClosedSectionException extends VKApiException {

	/**
	 * VKApiTicketsPassClosedSectionException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(1506, 'You cannot pass the ticket to this section, it is closed for you', $error);
	}
}
