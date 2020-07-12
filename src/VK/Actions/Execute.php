<?php
namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\Api\VKApiCompileException;
use VK\Exceptions\Api\VKApiRuntimeException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

/**
 */
class Execute {

	/**
	 * @var VKApiRequest
	 */
	private $request;

	/**
	 * AppWidgets constructor.
	 *
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request) {
		$this->request = $request;
	}

    /**
     * Returns a collection of application images by id.
     *
     * @param string $access_token
     * @param array $params
     * - @var string code: VKScript code
     * @throws VKClientException
     * @throws VKApiException
     * @throws VKApiCompileException Unable to compile code
     * @throws VKApiRuntimeException Runtime error occurred during code invocation
     * @return mixed
     */
	public function __invoke($access_token, $params = [])
  {
      return $this->request->post('execute', $access_token, $params);
  }

}
