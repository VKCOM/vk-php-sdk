<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiGroupNeed2faException extends VKApiException {

	/**
	 * VKApiGroupNeed2faException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(703, 'You need to enable 2FA for this action', $error);
	}
}
