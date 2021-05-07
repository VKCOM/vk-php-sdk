<?php

namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\VKClientException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\Api\undefined;
use VK\Actions\Enum\AppsGetPlatform;
use VK\Actions\Enum\AppsGetNameCase;
use VK\Actions\Enum\AppsGetCatalogSort;
use VK\Actions\Enum\AppsGetCatalogFilter;
use VK\Actions\Enum\AppsGetFriendsListType;
use VK\Actions\Enum\AppsGetLeaderboardType;
use VK\Actions\Enum\AppsGetScopesType;
use VK\Actions\Enum\AppsSendRequestType;

class Apps {

    /**
     * @var VKApiRequest
     */
    private $request;

    /**
     * Apps constructor.
     * @param VKApiRequest $request
     */
    public function __construct(VKApiRequest $request) {
        $this->request = $request;
    }

    /**
     * Deletes all request notifications from the current app.
     *
     * @param $access_token string
     * @param $params array
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function deleteAppRequests(string $access_token, array $params = array()) {
        return $this->request->post('apps.deleteAppRequests', $access_token, $params);
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
     *      - boolean extended:
     *      - boolean return_friends:
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
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function get(string $access_token, array $params = array()) {
        return $this->request->post('apps.get', $access_token, $params);
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
     *      - AppsGetCatalogFilter filter: 'installed' — to return list of installed apps (only for mobile
     *        platform).
     *        @see AppsGetCatalogFilter
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function getCatalog(string $access_token, array $params = array()) {
        return $this->request->post('apps.getCatalog', $access_token, $params);
    }

    /**
     * Creates friends list for requests and invites in current app.
     *
     * @param $access_token string
     * @param $params array
     *      - boolean extended:
     *      - integer count: List size.
     *      - integer offset:
     *      - AppsGetFriendsListType type: List type. Possible values: * 'invite' — available for invites (don't
     *        play the game),, * 'request' — available for request (play the game). By default: 'invite'.
     *        @see AppsGetFriendsListType
     *      - array fields: Additional profile fields, see [vk.com/dev/fields|description].
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
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
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function getLeaderboard(string $access_token, array $params = array()) {
        return $this->request->post('apps.getLeaderboard', $access_token, $params);
    }

    /**
     * Returns policies and terms given to a mini app.
     *
     * @param $access_token string
     * @param $params array
     *      - integer app_id: Mini App ID
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function getMiniAppPolicies(string $access_token, array $params = array()) {
        return $this->request->post('apps.getMiniAppPolicies', $access_token, $params);
    }

    /**
     * Returns scopes for auth
     *
     * @param $access_token string
     * @param $params array
     *      - AppsGetScopesType type:
     *        @see AppsGetScopesType
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function getScopes(string $access_token, array $params = array()) {
        return $this->request->post('apps.getScopes', $access_token, $params);
    }

    /**
     * Returns user score in app
     *
     * @param $access_token string
     * @param $params array
     *      - integer user_id:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function getScore(string $access_token, array $params = array()) {
        return $this->request->post('apps.getScore', $access_token, $params);
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *      - integer promo_id: Id of game promo action
     *      - integer user_id:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     *
     */
    public function promoHasActiveGift(string $access_token, array $params = array()) {
        return $this->request->post('apps.promoHasActiveGift', $access_token, $params);
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *      - integer promo_id: Id of game promo action
     *      - integer user_id:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     *
     */
    public function promoUseGift(string $access_token, array $params = array()) {
        return $this->request->post('apps.promoUseGift', $access_token, $params);
    }

    /**
     * Sends a request to another user in an app that uses VK authorization.
     *
     * @param $access_token string
     * @param $params array
     *      - integer user_id: id of the user to send a request
     *      - string text: request text
     *      - AppsSendRequestType type: request type. Values: 'invite' - if the request is sent to a user who does
     *        not have the app installed,, 'request' - if a user has already installed the app
     *        @see AppsSendRequestType
     *      - string name:
     *      - string key: special string key to be sent with the request
     *      - boolean separate:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function sendRequest(string $access_token, array $params = array()) {
        return $this->request->post('apps.sendRequest', $access_token, $params);
    }
}
