<?php

namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\VKClientException;
use VK\Exceptions\Api\VKApiException;
use VK\Actions\Enums\UsersGetNameCase;
use VK\Actions\Enums\UsersSearchSort;
use VK\Actions\Enums\UsersSearchSex;
use VK\Actions\Enums\UsersSearchStatus;
use VK\Actions\Enums\UsersGetFollowersNameCase;
use VK\Actions\Enums\UsersReportType;
use VK\Actions\Enums\UsersGetNearbyRadius;
use VK\Actions\Enums\UsersGetNearbyNameCase;

class Users {

    /**
     * @var VKApiRequest
     **/
    private $request;

    /**
     * Users constructor.
     * @param VKApiRequest $request
     */
    public function __construct(VKApiRequest $request) {
        $this->request = $request;
    }

    /**
     * Returns detailed information on users.
     * 
     * @param $access_token string
     * @param $params array
     *      - array user_ids: User IDs or screen names ('screen_name'). By default, current user ID.
     *      - array fields: Profile fields to return. Sample values: 'nickname', 'screen_name', 'sex', 'bdate'
     *        (birthdate), 'city', 'country', 'timezone', 'photo', 'photo_medium', 'photo_big', 'has_mobile', 'contacts',
     *        'education', 'online', 'counters', 'relation', 'last_seen', 'activity', 'can_write_private_message',
     *        'can_see_all_posts', 'can_post', 'universities',
     *      - UsersGetNameCase name_case: Case for declension of user name and surname: 'nom' — nominative
     *        (default), 'gen' — genitive , 'dat' — dative, 'acc' — accusative , 'ins' — instrumental , 'abl' —
     *        prepositional
     *        @see UsersGetNameCase
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function get(string $access_token, array $params = array()) {
        return $this->request->post('users.get', $access_token, $params);
    }

    /**
     * Returns a list of users matching the search criteria.
     * 
     * @param $access_token string
     * @param $params array
     *      - string q: Search query string (e.g., 'Vasya Babich').
     *      - UsersSearchSort sort: Sort order: '1' — by date registered, '0' — by rating
     *        @see UsersSearchSort
     *      - integer offset: Offset needed to return a specific subset of users.
     *      - integer count: Number of users to return.
     *      - array fields: Profile fields to return. Sample values: 'nickname', 'screen_name', 'sex', 'bdate'
     *        (birthdate), 'city', 'country', 'timezone', 'photo', 'photo_medium', 'photo_big', 'has_mobile', 'rate',
     *        'contacts', 'education', 'online',
     *      - integer city: City ID.
     *      - integer country: Country ID.
     *      - string hometown: City name in a string.
     *      - integer university_country: ID of the country where the user graduated.
     *      - integer university: ID of the institution of higher education.
     *      - integer university_year: Year of graduation from an institution of higher education.
     *      - integer university_faculty: Faculty ID.
     *      - integer university_chair: Chair ID.
     *      - UsersSearchSex sex: '1' — female, '2' — male, '0' — any (default)
     *        @see UsersSearchSex
     *      - UsersSearchStatus status: Relationship status: '1' — Not married, '2' — In a relationship, '3'
     *        — Engaged, '4' — Married, '5' — It's complicated, '6' — Actively searching, '7' — In love
     *        @see UsersSearchStatus
     *      - integer age_from: Minimum age.
     *      - integer age_to: Maximum age.
     *      - integer birth_day: Day of birth.
     *      - integer birth_month: Month of birth.
     *      - integer birth_year: Year of birth.
     *      - boolean online: '1' — online only, '0' — all users
     *      - boolean has_photo: '1' — with photo only, '0' — all users
     *      - integer school_country: ID of the country where users finished school.
     *      - integer school_city: ID of the city where users finished school.
     *      - integer school_class:
     *      - integer school: ID of the school.
     *      - integer school_year: School graduation year.
     *      - string religion: Users' religious affiliation.
     *      - string interests: Users' interests.
     *      - string company: Name of the company where users work.
     *      - string position: Job position.
     *      - integer group_id: ID of a community to search in communities.
     *      - array from_list:
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function search(string $access_token, array $params = array()) {
        return $this->request->post('users.search', $access_token, $params);
    }

    /**
     * Returns information whether a user installed the application.
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
    public function isAppUser(string $access_token, array $params = array()) {
        return $this->request->post('users.isAppUser', $access_token, $params);
    }

    /**
     * Returns a list of IDs of users and communities followed by the user.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer user_id: User ID.
     *      - boolean extended: '1' — to return a combined list of users and communities, '0' — to return
     *        separate lists of users and communities (default)
     *      - integer offset: Offset needed to return a specific subset of subscriptions.
     *      - integer count: Number of users and communities to return.
     *      - array fields:
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getSubscriptions(string $access_token, array $params = array()) {
        return $this->request->post('users.getSubscriptions', $access_token, $params);
    }

    /**
     * Returns a list of IDs of followers of the user in question, sorted by date added, most recent first.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer user_id: User ID.
     *      - integer offset: Offset needed to return a specific subset of followers.
     *      - integer count: Number of followers to return.
     *      - array fields: Profile fields to return. Sample values: 'nickname', 'screen_name', 'sex', 'bdate'
     *        (birthdate), 'city', 'country', 'timezone', 'photo', 'photo_medium', 'photo_big', 'has_mobile', 'rate',
     *        'contacts', 'education', 'online'.
     *      - UsersGetFollowersNameCase name_case: Case for declension of user name and surname: 'nom' —
     *        nominative (default), 'gen' — genitive , 'dat' — dative, 'acc' — accusative , 'ins' — instrumental ,
     *        'abl' — prepositional
     *        @see UsersGetFollowersNameCase
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getFollowers(string $access_token, array $params = array()) {
        return $this->request->post('users.getFollowers', $access_token, $params);
    }

    /**
     * Reports (submits a complain about) a user.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer user_id: ID of the user about whom a complaint is being made.
     *      - UsersReportType type: Type of complaint: 'porn' – pornography, 'spam' – spamming, 'insult' –
     *        abusive behavior, 'advertisment' – disruptive advertisements
     *        @see UsersReportType
     *      - string comment: Comment describing the complaint.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function report(string $access_token, array $params = array()) {
        return $this->request->post('users.report', $access_token, $params);
    }

    /**
     * Indexes current user location and returns nearby users.
     * 
     * @param $access_token string
     * @param $params array
     *      - number latitude: geographic latitude of the place a user is located, in degrees (from -90 to 90)
     *      - number longitude: geographic longitude of the place a user is located, in degrees (from -180 to 180)
     *      - integer accuracy: current location accuracy in meters
     *      - integer timeout: time when a user disappears from location search results, in seconds
     *      - UsersGetNearbyRadius radius: search zone radius type (1 to 4), :* 1 – 300 m,, :* 2 – 2400 m,, :*
     *        3 – 18 km,, :* 4 – 150 km.
     *        @see UsersGetNearbyRadius
     *      - array fields: list of additional fields to return. Available values: sex, bdate, city, country,
     *        photo_50, photo_100, photo_200_orig, photo_200, photo_400_orig, photo_max, photo_max_orig, online,
     *        online_mobile, domain, has_mobile, contacts, connections, site, education, universities, schools, can_post,
     *        can_see_all_posts, can_see_audio, can_write_private_message, status, last_seen, common_count, relation,
     *        relatives, counters, screen_name, maiden_name, timezone, occupation
     *      - UsersGetNearbyNameCase name_case: Case for declension of user name and surname: , nom –nominative
     *        (default) , gen – genitive , dat – dative , acc – accusative , ins – instrumental , abl –
     *        prepositional
     *        @see UsersGetNearbyNameCase
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getNearby(string $access_token, array $params = array()) {
        return $this->request->post('users.getNearby', $access_token, $params);
    }
}
