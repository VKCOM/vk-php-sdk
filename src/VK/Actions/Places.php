<?php
namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

/**
 */
class Places {

	/**
	 * @var VKApiRequest
	 */
	private $request;

	/**
	 * Places constructor.
	 *
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request) {
		$this->request = $request;
	}
}
