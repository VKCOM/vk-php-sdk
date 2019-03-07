<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiSignatureException extends VKApiException {

	/**
	 * VKApiSignatureException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(4, 'Incorrect signature', $error);
	}
}
