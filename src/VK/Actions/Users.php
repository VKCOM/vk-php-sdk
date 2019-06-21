<?php
namespace VK\Actions;

use VK\Actions\Enums\UsersNameCase;
use VK\Actions\Enums\UsersSex;
use VK\Actions\Enums\UsersSort;
use VK\Actions\Enums\UsersStatus;
use VK\Actions\Enums\UsersType;
use VK\Client\VKApiRequest;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

/**
 */
class Users {

	/**
	 * @var VKApiRequest
	 */
	private $request;

	/**
	 * Users constructor.
	 *
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request) {
		$this->request = $request;
	}

	/**
	 * Returns detailed information on users.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var array[string] user_ids: User IDs or screen names ('screen_name'). By default, current user ID.
	 * - @var array[UsersFields] fields: Profile fields to return. Sample values: 'nickname', 'screen_name', 'sex', 'bdate' (birthdate), 'city', 'country', 'timezone', 'photo', 'photo_medium', 'photo_big', 'has_mobile', 'contacts', 'education', 'online', 'counters', 'relation', 'last_seen', 'activity', 'can_write_private_message', 'can_see_all_posts', 'can_post', 'universities',
	 * - @var UsersNameCase name_case: Case for declension of user name and surname: 'nom' — nominative (default), 'gen' — genitive , 'dat' — dative, 'acc' — accusative , 'ins' — instrumental , 'abl' — prepositional
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function get($access_token, array $params = []) {
		return $this->request->post('users.get', $access_token, $params);
	}

	/**
	 * Returns a list of IDs of followers of the user in question, sorted by date added, most recent first.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer user_id: User ID.
	 * - @var integer offset: Offset needed to return a specific subset of followers.
	 * - @var integer count: Number of followers to return.
	 * - @var array[UsersFields] fields: Profile fields to return. Sample values: 'nickname', 'screen_name', 'sex', 'bdate' (birthdate), 'city', 'country', 'timezone', 'photo', 'photo_medium', 'photo_big', 'has_mobile', 'rate', 'contacts', 'education', 'online'.
	 * - @var UsersNameCase name_case: Case for declension of user name and surname: 'nom' — nominative (default), 'gen' — genitive , 'dat' — dative, 'acc' — accusative , 'ins' — instrumental , 'abl' — prepositional
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getFollowers($access_token, array $params = []) {
		return $this->request->post('users.getFollowers', $access_token, $params);
	}

	/**
	 * Returns a list of IDs of users and communities followed by the user.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer user_id: User ID.
	 * - @var boolean extended: '1' — to return a combined list of users and communities, '0' — to return separate lists of users and communities (default)
	 * - @var integer offset: Offset needed to return a specific subset of subscriptions.
	 * - @var integer count: Number of users and communities to return.
	 * - @var array[UsersFields] fields
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getSubscriptions($access_token, array $params = []) {
		return $this->request->post('users.getSubscriptions', $access_token, $params);
	}

	/**
	 * Returns information whether a user installed the application.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer user_id
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function isAppUser($access_token, array $params = []) {
		return $this->request->post('users.isAppUser', $access_token, $params);
	}

	/**
	 * Reports (submits a complain about) a user.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer user_id: ID of the user about whom a complaint is being made.
	 * - @var UsersType type: Type of complaint: 'porn' – pornography, 'spam' – spamming, 'insult' – abusive behavior, 'advertisement' – disruptive advertisements
	 * - @var string comment: Comment describing the complaint.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function report($access_token, array $params = []) {
		return $this->request->post('users.report', $access_token, $params);
	}

	/**
	 * Returns a list of users matching the search criteria.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var string q: Search query string (e.g., 'Vasya Babich').
	 * - @var UsersSort sort: Sort order: '1' — by date registered, '0' — by rating
	 * - @var integer offset: Offset needed to return a specific subset of users.
	 * - @var integer count: Number of users to return.
	 * - @var array[UsersFields] fields: Profile fields to return. Sample values: 'nickname', 'screen_name', 'sex', 'bdate' (birthdate), 'city', 'country', 'timezone', 'photo', 'photo_medium', 'photo_big', 'has_mobile', 'rate', 'contacts', 'education', 'online',
	 * - @var integer city: City ID.
	 * - @var integer country: Country ID.
	 * - @var string hometown: City name in a string.
	 * - @var integer university_country: ID of the country where the user graduated.
	 * - @var integer university: ID of the institution of higher education.
	 * - @var integer university_year: Year of graduation from an institution of higher education.
	 * - @var integer university_faculty: Faculty ID.
	 * - @var integer university_chair: Chair ID.
	 * - @var UsersSex sex: '1' — female, '2' — male, '0' — any (default)
	 * - @var UsersStatus status: Relationship status: '1' — Not married, '2' — In a relationship, '3' — Engaged, '4' — Married, '5' — It's complicated, '6' — Actively searching, '7' — In love
	 * - @var integer age_from: Minimum age.
	 * - @var integer age_to: Maximum age.
	 * - @var integer birth_day: Day of birth.
	 * - @var integer birth_month: Month of birth.
	 * - @var integer birth_year: Year of birth.
	 * - @var boolean online: '1' — online only, '0' — all users
	 * - @var boolean has_photo: '1' — with photo only, '0' — all users
	 * - @var integer school_country: ID of the country where users finished school.
	 * - @var integer school_city: ID of the city where users finished school.
	 * - @var integer school_class
	 * - @var integer school: ID of the school.
	 * - @var integer school_year: School graduation year.
	 * - @var string religion: Users' religious affiliation.
	 * - @var string interests: Users' interests.
	 * - @var string company: Name of the company where users work.
	 * - @var string position: Job position.
	 * - @var integer group_id: ID of a community to search in communities.
	 * - @var array[string] from_list
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function search($access_token, array $params = []) {
		return $this->request->post('users.search', $access_token, $params);
	}
}
