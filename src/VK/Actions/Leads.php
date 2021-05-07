<?php
namespace VK\Actions;

use VK\Actions\Enums\LeadsStatus;
use VK\Client\VKApiRequest;
use VK\Exceptions\Api\VKApiActionFailedException;
use VK\Exceptions\Api\VKApiLimitsException;
use VK\Exceptions\Api\VKApiVotesException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

/**
 */
class Leads {

	/**
	 * @var VKApiRequest
	 */
	private $request;

	/**
	 * Leads constructor.
	 *
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request) {
		$this->request = $request;
	}

	/**
	 * Checks if the user can start the lead.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer lead_id: Lead ID.
	 * - @var integer test_result: Value to be return in 'result' field when test mode is used.
	 * - @var boolean test_mode
	 * - @var boolean auto_start
	 * - @var integer age: User age.
	 * - @var string country: User country code.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiActionFailedException Unable to process action
	 * @return mixed
	 */
	public function checkUser($access_token, array $params = []) {
		return $this->request->post('leads.checkUser', $access_token, $params);
	}

	/**
	 * Completes the lead started by user.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var string vk_sid: Session obtained as GET parameter when session started.
	 * - @var string secret: Secret key from the lead testing interface.
	 * - @var string comment: Comment text.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiLimitsException Out of limits
	 * @throws VKApiVotesException Not enough votes
	 * @return mixed
	 */
	public function complete($access_token, array $params = []) {
		return $this->request->post('leads.complete', $access_token, $params);
	}

	/**
	 * Returns lead stats data.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer lead_id: Lead ID.
	 * - @var string secret: Secret key obtained from the lead testing interface.
	 * - @var string date_start: Day to start stats from (YYYY_MM_DD, e.g.2011-09-17).
	 * - @var string date_end: Day to finish stats (YYYY_MM_DD, e.g.2011-09-17).
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getStats($access_token, array $params = []) {
		return $this->request->post('leads.getStats', $access_token, $params);
	}

	/**
	 * Returns a list of last user actions for the offer.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer offer_id: Offer ID.
	 * - @var string secret: Secret key obtained in the lead testing interface.
	 * - @var integer offset: Offset needed to return a specific subset of results.
	 * - @var integer count: Number of results to return.
	 * - @var LeadsStatus status: Action type. Possible values: *'0' — start,, *'1' — finish,, *'2' — blocking users,, *'3' — start in a test mode,, *'4' — finish in a test mode.
	 * - @var boolean reverse: Sort order. Possible values: *'1' — chronological,, *'0' — reverse chronological.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getUsers($access_token, array $params = []) {
		return $this->request->post('leads.getUsers', $access_token, $params);
	}

	/**
	 * Counts the metric event.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var string data: Metric data obtained in the lead interface.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function metricHit($access_token, array $params = []) {
		return $this->request->post('leads.metricHit', $access_token, $params);
	}

	/**
	 * Creates new session for the user passing the offer.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer lead_id: Lead ID.
	 * - @var string secret: Secret key from the lead testing interface.
	 * - @var integer uid
	 * - @var integer aid
	 * - @var boolean test_mode
	 * - @var boolean force
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiLimitsException Out of limits
	 * @return mixed
	 */
	public function start($access_token, array $params = []) {
		return $this->request->post('leads.start', $access_token, $params);
	}
}
