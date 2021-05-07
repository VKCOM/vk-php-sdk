<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiMarketTooManyAlbumsException extends VKApiException {

	/**
	 * VKApiMarketTooManyAlbumsException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(1407, 'Too many albums', $error);
	}
}
