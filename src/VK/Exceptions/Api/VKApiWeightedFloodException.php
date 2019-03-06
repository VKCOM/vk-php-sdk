<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiWeightedFloodException extends VKApiException {

	/**
	 * VKApiWeightedFloodException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(601, 'Permission denied. You have requested too many actions this day. Try later.', $error);
	}
}
