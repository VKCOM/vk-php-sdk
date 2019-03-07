<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiGroupChangeCreatorException extends VKApiException {

	/**
	 * VKApiGroupChangeCreatorException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(700, 'Cannot edit creator role', $error);
	}
}
