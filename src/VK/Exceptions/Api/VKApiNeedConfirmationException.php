<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiNeedConfirmationException extends VKApiException {

	/**
	 * VKApiNeedConfirmationException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(24, 'Confirmation required', $error);
	}
}
