<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAdsLookalikeRequestExportAlreadyInProgressException extends VKApiException {

	/**
	 * VKApiAdsLookalikeRequestExportAlreadyInProgressException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(634, 'Lookalike request audience save already in progress', $error);
	}
}
