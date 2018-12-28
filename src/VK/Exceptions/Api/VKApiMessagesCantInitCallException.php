<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiMessagesCantInitCallException extends VKApiException {

	/**
	 * VKApiMessagesCantInitCallException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(929, 'Can't make an outgoing call', $error);
	}
}
