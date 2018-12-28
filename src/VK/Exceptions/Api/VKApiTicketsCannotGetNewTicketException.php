<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiTicketsCannotGetNewTicketException extends VKApiException {

	/**
	 * VKApiTicketsCannotGetNewTicketException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(1501, 'You already have too many tickets', $error);
	}
}
