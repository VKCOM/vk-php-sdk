<?php

namespace VK\Actions;

use VK\Client\Actions\ActionInterface;
use VK\Client\VKApiRequest;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

class Search implements ActionInterface
{
	/** @param VKApiRequest $request */
	private VKApiRequest $request;


	/**
	 * Search constructor.
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request)
	{
		$this->request = $request;
	}


	/**
	 * Allows the programmer to do a quick search for any substring.
	 * @param string $access_token
	 * @param array $params
	 * - @var string q: Search query string.
	 * - @var integer offset: Offset for querying specific result subset
	 * - @var integer limit: Maximum number of results to return.
	 * - @var array[string] filters
	 * - @var array[string] fields
	 * - @var boolean search_global
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getHints(string $access_token, array $params = [])
	{
		return $this->request->post('search.getHints', $access_token, $params);
	}
}

