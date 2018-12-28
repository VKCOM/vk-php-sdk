<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiStickersNotFavoriteException extends VKApiException {

	/**
	 * VKApiStickersNotFavoriteException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(2102, 'Stickers are not favorite', $error);
	}
}
