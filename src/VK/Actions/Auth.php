<?php
namespace VK\Actions;

use VK\Actions\Enum\AuthSex;
use VK\Client\VKApiRequest;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

/**
 */
class Auth {

	/**
	 * @var VKApiRequest
	 */
	private $request;

	/**
	 * Auth constructor.
	 *
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request) {
		$this->request = $request;
	}

	/**
	 * Checks a user's phone number for correctness.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var string phone: Phone number.
	 * - @var integer client_id: User ID.
	 * - @var string client_secret
	 * - @var boolean auth_by_phone
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function checkPhone($access_token, array $params = []) {
		return $this->request->post('auth.checkPhone', $access_token, $params);
	}

	/**
	 * Completes a user's registration (begun with the [vk.com/dev/auth.signup|auth.signup] method) using an authorization code.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer client_id
	 * - @var string client_secret
	 * - @var string phone
	 * - @var string code
	 * - @var string password
	 * - @var boolean test_mode
	 * - @var integer intro
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function confirm($access_token, array $params = []) {
		return $this->request->post('auth.confirm', $access_token, $params);
	}

	/**
	 * Allows to restore account access using a code received via SMS. " This method is only available for apps with [vk.com/dev/auth_direct|Direct authorization] access. "
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var string phone: User phone number.
	 * - @var string last_name: User last name.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function restore($access_token, array $params = []) {
		return $this->request->post('auth.restore', $access_token, $params);
	}

	/**
	 * Registers a new user by phone number.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var string first_name: User's first name.
	 * - @var string last_name: User's surname.
	 * - @var string birthday: User's birthday.
	 * - @var integer client_id: Your application ID.
	 * - @var string client_secret
	 * - @var string phone: User's phone number. Can be pre-checked with the [vk.com/dev/auth.checkPhone|auth.checkPhone] method.
	 * - @var string password: User's password (minimum of 6 characters). Can be specified later with the [vk.com/dev/auth.confirm|auth.confirm] method.
	 * - @var boolean test_mode: '1' — test mode, in which the user will not be registered and the phone number will not be checked for availability, '0' — default mode (default)
	 * - @var boolean voice: '1' — call the phone number and leave a voice message of the authorization code, '0' — send the code by SMS (default)
	 * - @var AuthSex sex: '1' — female, '2' — male
	 * - @var string sid: Session ID required for method recall when SMS was not delivered.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function signup($access_token, array $params = []) {
		return $this->request->post('auth.signup', $access_token, $params);
	}
}
