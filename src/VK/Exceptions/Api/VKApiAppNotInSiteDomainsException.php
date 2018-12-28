<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAppNotInSiteDomainsException extends VKApiException {

	/**
	 * VKApiAppNotInSiteDomainsException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(612, 'Application must be in domains list of site of ad unit', $error);
	}
}
