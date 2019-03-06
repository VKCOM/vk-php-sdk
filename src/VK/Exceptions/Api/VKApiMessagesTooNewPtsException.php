<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiMessagesTooNewPtsException extends VKApiException {

	/**
	 * VKApiMessagesTooNewPtsException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(908, 'Value of ts or pts is too new', $error);
	}
}
