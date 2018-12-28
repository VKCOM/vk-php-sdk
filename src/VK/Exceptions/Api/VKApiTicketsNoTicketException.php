<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiTicketsNoTicketException extends VKApiException {

	/**
	 * VKApiTicketsNoTicketException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(1503, 'Cannot get this ticket (maybe it was deleted)', $error);
	}
}
