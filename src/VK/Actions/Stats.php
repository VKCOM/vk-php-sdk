<?php
namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\Api\VKApiWallAccessPostException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

/**
 */
class Stats {

	/**
	 * @var VKApiRequest
	 */
	private $request;

	/**
	 * Stats constructor.
	 *
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request) {
		$this->request = $request;
	}

	/**
	 * Returns statistics of a community or an application.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer group_id: Community ID.
	 * - @var integer app_id: Application ID.
	 * - @var integer timestamp_from
	 * - @var integer timestamp_to
	 * - @var string interval
	 * - @var integer intervals_count
	 * - @var array[string] filters
	 * - @var array[string] stats_groups
	 * - @var boolean extended
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function get($access_token, array $params = []) {
		return $this->request->post('stats.get', $access_token, $params);
	}

	/**
	 * Returns stats for a wall post.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var string owner_id: post owner community id. Specify with "-" sign.
	 * - @var integer post_id: wall post id. Note that stats are available only for '300' last (newest) posts on a community wall.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWallAccessPostException Access to wall's post denied
	 * @return mixed
	 */
	public function getPostReach($access_token, array $params = []) {
		return $this->request->post('stats.getPostReach', $access_token, $params);
	}

	/**
	 * @param string $access_token
	 * @param array $params 
	 * - @var string id
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function trackVisitor($access_token, array $params = []) {
		return $this->request->post('stats.trackVisitor', $access_token, $params);
	}
}
