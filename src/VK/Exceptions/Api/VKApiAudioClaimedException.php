<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAudioClaimedException extends VKApiException {

	/**
	 * VKApiAudioClaimedException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(270, 'The audio file was removed by the copyright holder and cannot be reuploaded.', $error);
	}
}
