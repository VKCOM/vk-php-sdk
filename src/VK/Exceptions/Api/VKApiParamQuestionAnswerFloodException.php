<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiParamQuestionAnswerFloodException extends VKApiException {

	/**
	 * VKApiParamQuestionAnswerFloodException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(136, 'Flood control on answers', $error);
	}
}
