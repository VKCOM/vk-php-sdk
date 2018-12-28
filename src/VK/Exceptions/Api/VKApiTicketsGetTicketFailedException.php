<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiTicketsGetTicketFailedException extends VKApiException {

	/**
	 * VKApiTicketsGetTicketFailedException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(1502, 'Unknown error getting a new ticket (maybe no free tickets left)', $error);
	}
}
