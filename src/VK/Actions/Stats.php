<?php

namespace VK\Actions;

use VK\Client\Actions\ActionInterface;
use VK\Client\VKApiRequest;
use VK\Enums\StatsInterval;
use VK\Exceptions\Api\VKApiWallAccessPostException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

class Stats implements ActionInterface
{
	/** @param VKApiRequest $request */
	private VKApiRequest $request;


	/**
	 * Stats constructor.
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request)
	{
		$this->request = $request;
	}


	/**
	 * Returns statistics of a community or an application.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id: Community ID.
	 * - @var integer app_id: Application ID.
	 * - @var integer timestamp_from
	 * - @var integer timestamp_to
	 * - @var StatsInterval interval
	 * - @var integer intervals_count
	 * - @var array[string] filters
	 * - @var array[string] stats_groups
	 * - @var boolean extended
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function get(string $access_token, array $params = [])
	{
		return $this->request->post('stats.get', $access_token, $params);
	}


	/**
	 * Returns stats for a wall post.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer owner_id: post owner community id. Specify with "-" sign.
	 * - @var array[integer] post_ids: wall posts id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWallAccessPostException Access to wall's post denied
	 */
	public function getPostReach(string $access_token, array $params = [])
	{
		return $this->request->post('stats.getPostReach', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function trackVisitor(string $access_token)
	{
		return $this->request->post('stats.trackVisitor', $access_token);
	}
}

