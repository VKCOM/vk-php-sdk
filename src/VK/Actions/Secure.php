<?php
namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\Api\VKApiAccessMenuException;
use VK\Exceptions\Api\VKApiAppsAlreadyUnlockedException;
use VK\Exceptions\Api\VKApiInsufficientFundsException;
use VK\Exceptions\Api\VKApiMobileNotActivatedException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

/**
 */
class Secure {

	/**
	 * @var VKApiRequest
	 */
	private $request;

	/**
	 * Secure constructor.
	 *
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request) {
		$this->request = $request;
	}

	/**
	 * Adds user activity information to an application
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer user_id: ID of a user to save the data
	 * - @var integer activity_id: there are 2 default activities: , * 1 – level. Works similar to ,, * 2 – points, saves points amount, Any other value is for saving completed missions
	 * - @var integer value: depends on activity_id: * 1 – number, current level number,, * 2 – number, current user's points amount, , Any other value is ignored
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAppsAlreadyUnlockedException This achievement is already unlocked
	 * @return mixed
	 */
	public function addAppEvent($access_token, array $params = []) {
		return $this->request->post('secure.addAppEvent', $access_token, $params);
	}

	/**
	 * Checks the user authentication in 'IFrame' and 'Flash' apps using the 'access_token' parameter.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var string token: client 'access_token'
	 * - @var string ip: user 'ip address'. Note that user may access using the 'ipv6' address, in this case it is required to transmit the 'ipv6' address. If not transmitted, the address will not be checked.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function checkToken($access_token, array $params = []) {
		return $this->request->post('secure.checkToken', $access_token, $params);
	}

	/**
	 * Returns payment balance of the application in hundredth of a vote.
	 *
	 * @param string $access_token
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getAppBalance($access_token) {
		return $this->request->post('secure.getAppBalance', $access_token);
	}

	/**
	 * Shows a list of SMS notifications sent by the application using [vk.com/dev/secure.sendSMSNotification|secure.sendSMSNotification] method.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer user_id
	 * - @var integer date_from: filter by start date. It is set as UNIX-time.
	 * - @var integer date_to: filter by end date. It is set as UNIX-time.
	 * - @var integer limit: number of returned posts. By default — 1000.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getSMSHistory($access_token, array $params = []) {
		return $this->request->post('secure.getSMSHistory', $access_token, $params);
	}

	/**
	 * Shows history of votes transaction between users and the application.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer type
	 * - @var integer uid_from
	 * - @var integer uid_to
	 * - @var integer date_from
	 * - @var integer date_to
	 * - @var integer limit
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getTransactionsHistory($access_token, array $params = []) {
		return $this->request->post('secure.getTransactionsHistory', $access_token, $params);
	}

	/**
	 * Returns one of the previously set game levels of one or more users in the application.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var array[integer] user_ids
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getUserLevel($access_token, array $params = []) {
		return $this->request->post('secure.getUserLevel', $access_token, $params);
	}

	/**
	 * Opens the game achievement and gives the user a sticker
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var array[integer] user_ids
	 * - @var integer achievement_id
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function giveEventSticker($access_token, array $params = []) {
		return $this->request->post('secure.giveEventSticker', $access_token, $params);
	}

	/**
	 * Sends notification to the user.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var array[integer] user_ids
	 * - @var integer user_id
	 * - @var string message: notification text which should be sent in 'UTF-8' encoding ('254' characters maximum).
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function sendNotification($access_token, array $params = []) {
		return $this->request->post('secure.sendNotification', $access_token, $params);
	}

	/**
	 * Sends 'SMS' notification to a user's mobile device.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer user_id: ID of the user to whom SMS notification is sent. The user shall allow the application to send him/her notifications (, +1).
	 * - @var string message: 'SMS' text to be sent in 'UTF-8' encoding. Only Latin letters and numbers are allowed. Maximum size is '160' characters.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiInsufficientFundsException Application has insufficient funds
	 * @throws VKApiMobileNotActivatedException The mobile number of the user is unknown
	 * @return mixed
	 */
	public function sendSMSNotification($access_token, array $params = []) {
		return $this->request->post('secure.sendSMSNotification', $access_token, $params);
	}

	/**
	 * Sets a counter which is shown to the user in bold in the left menu.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var array[string] counters
	 * - @var integer user_id
	 * - @var integer counter: counter value.
	 * - @var boolean increment
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAccessMenuException Access to the menu of the user denied
	 * @return mixed
	 */
	public function setCounter($access_token, array $params = []) {
		return $this->request->post('secure.setCounter', $access_token, $params);
	}
}
