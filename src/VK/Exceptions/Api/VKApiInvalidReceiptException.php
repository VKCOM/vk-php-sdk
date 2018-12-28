<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiInvalidReceiptException extends VKApiException {

	/**
	 * VKApiInvalidReceiptException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(26, 'Invalid device receipt', $error);
	}
}
