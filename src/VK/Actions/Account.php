<?php
namespace VK\Actions;

use VK\Actions\Enums\AccountBdateVisibility;
use VK\Actions\Enums\AccountRelation;
use VK\Actions\Enums\AccountSex;
use VK\Client\VKApiRequest;
use VK\Exceptions\Api\VKApiAccessMenuException;
use VK\Exceptions\Api\VKApiInvalidAddressException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

/**
 */
class Account {

	/**
	 * @var VKApiRequest
	 */
	private $request;

	/**
	 * Account constructor.
	 *
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request) {
		$this->request = $request;
	}

	/**
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function ban($access_token, array $params = []) {
		return $this->request->post('account.ban', $access_token, $params);
	}

	/**
	 * Changes a user password after access is successfully restored with the [vk.com/dev/auth.restore|auth.restore] method.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var string restore_sid: Session id received after the [vk.com/dev/auth.restore|auth.restore] method is executed. (If the password is changed right after the access was restored)
	 * - @var string change_password_hash: Hash received after a successful OAuth authorization with a code got by SMS. (If the password is changed right after the access was restored)
	 * - @var string old_password: Current user password.
	 * - @var string new_password: New password that will be set as a current
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function changePassword($access_token, array $params = []) {
		return $this->request->post('account.changePassword', $access_token, $params);
	}

	/**
	 * Returns a list of active ads (offers) which executed by the user will bring him/her respective number of votes to his balance in the application.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer offset
	 * - @var integer count: Number of results to return.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getActiveOffers($access_token, array $params = []) {
		return $this->request->post('account.getActiveOffers', $access_token, $params);
	}

	/**
	 * Gets settings of the user in this application.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer user_id: User ID whose settings information shall be got. By default: current user.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getAppPermissions($access_token, array $params = []) {
		return $this->request->post('account.getAppPermissions', $access_token, $params);
	}

	/**
	 * Returns a user's blacklist.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer offset: Offset needed to return a specific subset of results.
	 * - @var integer count: Number of results to return.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getBanned($access_token, array $params = []) {
		return $this->request->post('account.getBanned', $access_token, $params);
	}

	/**
	 * Returns non-null values of user counters.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var array[AccountFilter] filter: Counters to be returned.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getCounters($access_token, array $params = []) {
		return $this->request->post('account.getCounters', $access_token, $params);
	}

	/**
	 * Returns current account info.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var array[AccountFields] fields: Fields to return. Possible values: *'country' — user country,, *'https_required' — is "HTTPS only" option enabled,, *'own_posts_default' — is "Show my posts only" option is enabled,, *'no_wall_replies' — are wall replies disabled or not,, *'intro' — is intro passed by user or not,, *'lang' — user language. By default: all.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getInfo($access_token, array $params = []) {
		return $this->request->post('account.getInfo', $access_token, $params);
	}

	/**
	 * Returns the current account info.
	 *
	 * @param string $access_token
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getProfileInfo($access_token) {
		return $this->request->post('account.getProfileInfo', $access_token);
	}

	/**
	 * Gets settings of push notifications.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var string device_id: Unique device ID.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getPushSettings($access_token, array $params = []) {
		return $this->request->post('account.getPushSettings', $access_token, $params);
	}

	/**
	 * Subscribes an iOS/Android/Windows Phone-based device to receive push notifications
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var string token: Device token used to send notifications. (for mpns, the token shall be URL for sending of notifications)
	 * - @var string device_model: String name of device model.
	 * - @var integer device_year: Device year.
	 * - @var string device_id: Unique device ID.
	 * - @var string system_version: String version of device operating system.
	 * - @var string settings: Push settings in a [vk.com/dev/push_settings|special format].
	 * - @var boolean sandbox
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function registerDevice($access_token, array $params = []) {
		return $this->request->post('account.registerDevice', $access_token, $params);
	}

	/**
	 * Edits current profile info.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var string first_name: User first name.
	 * - @var string last_name: User last name.
	 * - @var string maiden_name: User maiden name (female only)
	 * - @var string screen_name: User screen name.
	 * - @var integer cancel_request_id: ID of the name change request to be canceled. If this parameter is sent, all the others are ignored.
	 * - @var AccountSex sex: User sex. Possible values: , * '1' – female,, * '2' – male.
	 * - @var AccountRelation relation: User relationship status. Possible values: , * '1' – single,, * '2' – in a relationship,, * '3' – engaged,, * '4' – married,, * '5' – it's complicated,, * '6' – actively searching,, * '7' – in love,, * '0' – not specified.
	 * - @var integer relation_partner_id: ID of the relationship partner.
	 * - @var string bdate: User birth date, format: DD.MM.YYYY.
	 * - @var AccountBdateVisibility bdate_visibility: Birth date visibility. Returned values: , * '1' – show birth date,, * '2' – show only month and day,, * '0' – hide birth date.
	 * - @var string home_town: User home town.
	 * - @var integer country_id: User country.
	 * - @var integer city_id: User city.
	 * - @var string status: Status text.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiInvalidAddressException Invalid screen name
	 * @return mixed
	 */
	public function saveProfileInfo($access_token, array $params = []) {
		return $this->request->post('account.saveProfileInfo', $access_token, $params);
	}

	/**
	 * Allows to edit the current account info.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var string name: Setting name.
	 * - @var string value: Setting value.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function setInfo($access_token, array $params = []) {
		return $this->request->post('account.setInfo', $access_token, $params);
	}

	/**
	 * Sets an application screen name (up to 17 characters), that is shown to the user in the left menu.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer user_id: User ID.
	 * - @var string name: Application screen name.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAccessMenuException Access to the menu of the user denied
	 * @return mixed
	 */
	public function setNameInMenu($access_token, array $params = []) {
		return $this->request->post('account.setNameInMenu', $access_token, $params);
	}

	/**
	 * Marks a current user as offline.
	 *
	 * @param string $access_token
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function setOffline($access_token) {
		return $this->request->post('account.setOffline', $access_token);
	}

	/**
	 * Marks the current user as online for 15 minutes.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var boolean voip: '1' if videocalls are available for current device.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function setOnline($access_token, array $params = []) {
		return $this->request->post('account.setOnline', $access_token, $params);
	}

	/**
	 * Change push settings.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var string device_id: Unique device ID.
	 * - @var string settings: Push settings in a [vk.com/dev/push_settings|special format].
	 * - @var string key: Notification key.
	 * - @var array[string] value: New value for the key in a [vk.com/dev/push_settings|special format].
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function setPushSettings($access_token, array $params = []) {
		return $this->request->post('account.setPushSettings', $access_token, $params);
	}

	/**
	 * Mutes push notifications for the set period of time.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var string device_id: Unique device ID.
	 * - @var integer time: Time in seconds for what notifications should be disabled. '-1' to disable forever.
	 * - @var integer peer_id: Destination ID. "For user: 'User ID', e.g. '12345'. For chat: '2000000000' + 'Chat ID', e.g. '2000000001'. For community: '- Community ID', e.g. '-12345'. "
	 * - @var integer sound: '1' — to enable sound in this dialog, '0' — to disable sound. Only if 'peer_id' contains user or community ID.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function setSilenceMode($access_token, array $params = []) {
		return $this->request->post('account.setSilenceMode', $access_token, $params);
	}

	/**
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function unban($access_token, array $params = []) {
		return $this->request->post('account.unban', $access_token, $params);
	}

	/**
	 * Unsubscribes a device from push notifications.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var string device_id: Unique device ID.
	 * - @var boolean sandbox
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function unregisterDevice($access_token, array $params = []) {
		return $this->request->post('account.unregisterDevice', $access_token, $params);
	}
}
