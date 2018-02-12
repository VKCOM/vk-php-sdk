<?php

namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\VKClientException;
use VK\Exceptions\Api\VKApiException;
use VK\Actions\Enums\AppsGetCatalogSort;
use VK\Actions\Enums\AppsGetPlatform;
use VK\Actions\Enums\AppsGetNameCase;
use VK\Actions\Enums\AppsSendRequestType;
use VK\Actions\Enums\AppsGetFriendsListType;
use VK\Actions\Enums\AppsGetLeaderboardType;

class Apps {

    /**
     * @var VKApiRequest
     **/
    private $request;

    /**
     * Apps constructor.
     * @param VKApiRequest $request
     */
    public function __construct(VKApiRequest $request) {
        $this->request = $request;
    }

    /**
     * Returns a list of applications (apps) available to users in the App Catalog.
     * 
     * @param $access_token string
     * @param $params array
     *      - AppsGetCatalogSort sort: Sort order: 'popular_today' — popular for one day (default), 'visitors'
     *        — by visitors number , 'create_date' — by creation date, 'growth_rate' — by growth rate,
     *        'popular_week' — popular for one week
     *        @see AppsGetCatalogSort
     *      - integer offset: Offset required to return a specific subset of apps.
     *      - integer count: Number of apps to return.
     *      - string platform:
     *      - boolean extended: '1' — to return additional fields 'screenshots', 'MAU', 'catalog_position', and
     *        'international'. If set, 'count' must be less than or equal to '100'. '0' — not to return additional
     *        fields (default).
     *      - boolean return_friends:
     *      - array fields:
     *      - string name_case:
     *      - string q: Search query string.
     *      - integer genre_id:
     *      - string filter: 'installed' — to return list of installed apps (only for mobile platform).
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getCatalog(string $access_token, array $params = array()) {
        return $this->request->post('apps.getCatalog', $access_token, $params);
    }

    /**
     * Returns applications data.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer app_id: Application ID
     *      - array app_ids: List of application ID
     *      - AppsGetPlatform platform: platform. Possible values: *'ios' — iOS,, *'android' — Android,,
     *        *'winphone' — Windows Phone,, *'web' — приложения на vk.com. By default: 'web'.
     *        @see AppsGetPlatform
     *      - array fields: Profile fields to return. Sample values: 'nickname', 'screen_name', 'sex', 'bdate'
     *        (birthdate), 'city', 'country', 'timezone', 'photo', 'photo_medium', 'photo_big', 'has_mobile', 'contacts',
     *        'education', 'online', 'counters', 'relation', 'last_seen', 'activity', 'can_write_private_message',
     *        'can_see_all_posts', 'can_post', 'universities', (only if return_friends - 1)
     *      - AppsGetNameCase name_case: Case for declension of user name and surname: 'nom' — nominative
     *        (default),, 'gen' — genitive,, 'dat' — dative,, 'acc' — accusative,, 'ins' — instrumental,, 'abl'
     *        — prepositional. (only if 'return_friends' = '1')
     *        @see AppsGetNameCase
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function get(string $access_token, array $params = array()) {
        return $this->request->post('apps.get', $access_token, $params);
    }

    /**
     * Sends a request to another user in an app that uses VK authorization.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer user_id: id of the user to send a request
     *      - string text: request text
     *      - AppsSendRequestType type: request type. Values: 'invite' – if the request is sent to a user who
     *        does not have the app installed,, 'request' – if a user has already installed the app
     *        @see AppsSendRequestType
     *      - string name:
     *      - string key: special string key to be sent with the request
     *      - boolean separate:
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function sendRequest(string $access_token, array $params = array()) {
        return $this->request->post('apps.sendRequest', $access_token, $params);
    }

    /**
     * Deletes all request notifications from the current app.
     * 
     * @param $access_token string
     * @param $params array
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function deleteAppRequests(string $access_token, array $params = array()) {
        return $this->request->post('apps.deleteAppRequests', $access_token, $params);
    }

    /**
     * Creates friends list for requests and invites in current app.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer count: List size.
     *      - AppsGetFriendsListType type: List type. Possible values: * 'invite' — available for invites (don't
     *        play the game),, * 'request' — available for request (play the game). By default: 'invite'.
     *        @see AppsGetFriendsListType
     *      - array fields: Additional profile fields, see [vk.com/dev/fields|description].
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getFriendsList(string $access_token, array $params = array()) {
        return $this->request->post('apps.getFriendsList', $access_token, $params);
    }

    /**
     * Returns players rating in the game.
     * 
     * @param $access_token string
     * @param $params array
     *      - AppsGetLeaderboardType type: Leaderboard type. Possible values: *'level' — by level,, *'points' —
     *        by mission points,, *'score' — by score ().
     *        @see AppsGetLeaderboardType
     *      - boolean global: Rating type. Possible values: *'1' — global rating among all players,, *'0' —
     *        rating among user friends.
     *      - boolean extended: 1 — to return additional info about users
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getLeaderboard(string $access_token, array $params = array()) {
        return $this->request->post('apps.getLeaderboard', $access_token, $params);
    }

    /**
     * Returns user score in app
     * 
     * @param $access_token string
     * @param $params array
     *      - integer user_id:
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getScore(string $access_token, array $params = array()) {
        return $this->request->post('apps.getScore', $access_token, $params);
    }
}
