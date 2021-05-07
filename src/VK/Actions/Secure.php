<?php

namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\VKClientException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\Api\undefined;

class Secure {

    /**
     * @var VKApiRequest
     */
    private $request;

    /**
     * Secure constructor.
     * @param VKApiRequest $request
     */
    public function __construct(VKApiRequest $request) {
        $this->request = $request;
    }

    /**
     * Adds user activity information to an application
     *
     * @param $access_token string
     * @param $params array
     *      - integer user_id: ID of a user to save the data
     *      - integer activity_id: there are 2 default activities: , * 1 - level. Works similar to ,, * 2 - points,
     *        saves points amount, Any other value is for saving completed missions
     *      - integer value: depends on activity_id: * 1 - number, current level number,, * 2 - number, current
     *        user's points amount, , Any other value is ignored
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     *
     */
    public function addAppEvent(string $access_token, array $params = array()) {
        return $this->request->post('secure.addAppEvent', $access_token, $params);
    }

    /**
     * Checks the user authentication in 'IFrame' and 'Flash' apps using the 'access_token' parameter.
     *
     * @param $access_token string
     * @param $params array
     *      - string token: client 'access_token'
     *      - string ip: user 'ip address'. Note that user may access using the 'ipv6' address, in this case it is
     *        required to transmit the 'ipv6' address. If not transmitted, the address will not be checked.
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function checkToken(string $access_token, array $params = array()) {
        return $this->request->post('secure.checkToken', $access_token, $params);
    }

    /**
     * Returns payment balance of the application in hundredth of a vote.
     *
     * @param $access_token string
     * @param $params array
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function getAppBalance(string $access_token, array $params = array()) {
        return $this->request->post('secure.getAppBalance', $access_token, $params);
    }

    /**
     * Shows a list of SMS notifications sent by the application using
     * [vk.com/dev/secure.sendSMSNotification|secure.sendSMSNotification] method.
     *
     * @param $access_token string
     * @param $params array
     *      - integer user_id:
     *      - integer date_from: filter by start date. It is set as UNIX-time.
     *      - integer date_to: filter by end date. It is set as UNIX-time.
     *      - integer limit: number of returned posts. By default — 1000.
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function getSMSHistory(string $access_token, array $params = array()) {
        return $this->request->post('secure.getSMSHistory', $access_token, $params);
    }

    /**
     * Shows history of votes transaction between users and the application.
     *
     * @param $access_token string
     * @param $params array
     *      - integer type:
     *      - integer uid_from:
     *      - integer uid_to:
     *      - integer date_from:
     *      - integer date_to:
     *      - integer limit:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function getTransactionsHistory(string $access_token, array $params = array()) {
        return $this->request->post('secure.getTransactionsHistory', $access_token, $params);
    }

    /**
     * Returns one of the previously set game levels of one or more users in the application.
     *
     * @param $access_token string
     * @param $params array
     *      - array user_ids:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function getUserLevel(string $access_token, array $params = array()) {
        return $this->request->post('secure.getUserLevel', $access_token, $params);
    }

    /**
     * Opens the game achievement and gives the user a sticker
     *
     * @param $access_token string
     * @param $params array
     *      - array user_ids:
     *      - integer achievement_id:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function giveEventSticker(string $access_token, array $params = array()) {
        return $this->request->post('secure.giveEventSticker', $access_token, $params);
    }

    /**
     * Sends notification to the user.
     *
     * @param $access_token string
     * @param $params array
     *      - array user_ids:
     *      - integer user_id:
     *      - string message: notification text which should be sent in 'UTF-8' encoding ('254' characters
     *        maximum).
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function sendNotification(string $access_token, array $params = array()) {
        return $this->request->post('secure.sendNotification', $access_token, $params);
    }

    /**
     * Sends 'SMS' notification to a user's mobile device.
     *
     * @param $access_token string
     * @param $params array
     *      - integer user_id: ID of the user to whom SMS notification is sent. The user shall allow the
     *        application to send him/her notifications (, +1).
     *      - string message: 'SMS' text to be sent in 'UTF-8' encoding. Only Latin letters and numbers are
     *        allowed. Maximum size is '160' characters.
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     * @throws undefined
     *
     */
    public function sendSMSNotification(string $access_token, array $params = array()) {
        return $this->request->post('secure.sendSMSNotification', $access_token, $params);
    }

    /**
     * Sets a counter which is shown to the user in bold in the left menu.
     *
     * @param $access_token string
     * @param $params array
     *      - array counters:
     *      - integer user_id:
     *      - integer counter: counter value.
     *      - boolean increment:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     *
     */
    public function setCounter(string $access_token, array $params = array()) {
        return $this->request->post('secure.setCounter', $access_token, $params);
    }
}
