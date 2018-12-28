<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiTicketsNotYourTicketException extends VKApiException {

	/**
	 * VKApiTicketsNotYourTicketException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(1504, 'You cannot reply to this ticket, it belongs to some other agent', $error);
	}
}
