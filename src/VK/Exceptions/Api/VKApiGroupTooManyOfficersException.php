<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiGroupTooManyOfficersException extends VKApiException {

	/**
	 * VKApiGroupTooManyOfficersException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(702, 'Too many officers in club', $error);
	}
}
