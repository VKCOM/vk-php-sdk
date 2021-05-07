<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiPrettyCardsCardIsConnectedToPostException extends VKApiException {

	/**
	 * VKApiPrettyCardsCardIsConnectedToPostException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(1902, 'Card is connected to post', $error);
	}
}
