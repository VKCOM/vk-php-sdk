<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiMessagesCantDeleteForAllException extends VKApiException {

	/**
	 * VKApiMessagesCantDeleteForAllException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(924, 'Can\'t delete this message for everybody', $error);
	}
}
