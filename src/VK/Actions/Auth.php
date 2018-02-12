<?php

namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\VKClientException;
use VK\Exceptions\Api\VKApiException;
use VK\Actions\Enums\AuthSignupSex;

class Auth {

    /**
     * @var VKApiRequest
     **/
    private $request;

    /**
     * Auth constructor.
     * @param VKApiRequest $request
     */
    public function __construct(VKApiRequest $request) {
        $this->request = $request;
    }

    /**
     * Checks a user's phone number for correctness.
     * 
     * @param $access_token string
     * @param $params array
     *      - string phone: Phone number.
     *      - integer client_id: User ID.
     *      - string client_secret:
     *      - boolean auth_by_phone:
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function checkPhone(string $access_token, array $params = array()) {
        return $this->request->post('auth.checkPhone', $access_token, $params);
    }

    /**
     * Registers a new user by phone number.
     * 
     * @param $access_token string
     * @param $params array
     *      - string first_name: User's first name.
     *      - string last_name: User's surname.
     *      - string birthday: User's birthday.
     *      - integer client_id: Your application ID.
     *      - string client_secret:
     *      - string phone: User's phone number. Can be pre-checked with the
     *        [vk.com/dev/auth.checkPhone|auth.checkPhone] method.
     *      - string password: User's password (minimum of 6 characters). Can be specified later with the
     *        [vk.com/dev/auth.confirm|auth.confirm] method.
     *      - boolean test_mode: '1' — test mode, in which the user will not be registered and the phone number
     *        will not be checked for availability, '0' — default mode (default)
     *      - boolean voice: '1' — call the phone number and leave a voice message of the authorization code, '0'
     *        — send the code by SMS (default)
     *      - AuthSignupSex sex: '1' — female, '2' — male
     *        @see AuthSignupSex
     *      - string sid: Session ID required for method recall when SMS was not delivered.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function signup(string $access_token, array $params = array()) {
        return $this->request->post('auth.signup', $access_token, $params);
    }

    /**
     * Completes a user's registration (begun with the [vk.com/dev/auth.signup|auth.signup] method) using an
     * authorization code.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer client_id:
     *      - string client_secret:
     *      - string phone:
     *      - string code:
     *      - string password:
     *      - boolean test_mode:
     *      - integer intro:
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function confirm(string $access_token, array $params = array()) {
        return $this->request->post('auth.confirm', $access_token, $params);
    }

    /**
     * Allows to restore account access using a code received via SMS. " This method is only available for apps with
     * [vk.com/dev/auth_direct|Direct authorization] access. "
     * 
     * @param $access_token string
     * @param $params array
     *      - string phone: User phone number.
     *      - string last_name: User last name.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function restore(string $access_token, array $params = array()) {
        return $this->request->post('auth.restore', $access_token, $params);
    }
}
