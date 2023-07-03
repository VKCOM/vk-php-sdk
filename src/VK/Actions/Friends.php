<?php

namespace VK\Actions;

use VK\Client\Actions\ActionInterface;
use VK\Client\VKApiRequest;
use VK\Enums\Base\NameCase;
use VK\Enums\FriendsOrder;
use VK\Enums\FriendsSort;
use VK\Exceptions\Api\VKApiFriendsAddEnemyException;
use VK\Exceptions\Api\VKApiFriendsAddInEnemyException;
use VK\Exceptions\Api\VKApiFriendsAddNotFoundException;
use VK\Exceptions\Api\VKApiFriendsAddYourselfException;
use VK\Exceptions\Api\VKApiFriendsListIdException;
use VK\Exceptions\Api\VKApiFriendsListLimitException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

class Friends implements ActionInterface
{
	/** @param VKApiRequest $request */
	private VKApiRequest $request;


	/**
	 * Friends constructor.
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request)
	{
		$this->request = $request;
	}


	/**
	 * Approves or creates a friend request.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer user_id: ID of the user whose friend request will be approved or to whom a friend request will be sent.
	 * - @var string text: Text of the message (up to 500 characters) for the friend request, if any.
	 * - @var boolean follow: '1' to pass an incoming request to followers list.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiFriendsAddInEnemyException Cannot add this user to friends as they have put you on their blacklist
	 * @throws VKApiFriendsAddEnemyException Cannot add this user to friends as you put him on blacklist
	 * @throws VKApiFriendsAddYourselfException Cannot add user himself as friend
	 * @throws VKApiFriendsAddNotFoundException Cannot add this user to friends as user not found
	 */
	public function add(string $access_token, array $params = [])
	{
		return $this->request->post('friends.add', $access_token, $params);
	}


	/**
	 * Creates a new friend list for the current user.
	 * @param string $access_token
	 * @param array $params
	 * - @var string name: Name of the friend list.
	 * - @var array[integer] user_ids: IDs of users to be added to the friend list.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiFriendsListLimitException Reached the maximum number of lists
	 */
	public function addList(string $access_token, array $params = [])
	{
		return $this->request->post('friends.addList', $access_token, $params);
	}


	/**
	 * Checks the current user's friendship status with other specified users.
	 * @param string $access_token
	 * @param array $params
	 * - @var array[integer] user_ids: IDs of the users whose friendship status to check.
	 * - @var boolean need_sign: '1' - to return 'sign' field. 'sign' is md5("{id}_{user_id}_{friends_status}_{application_secret}"), where id is current user ID. This field allows to check that data has not been modified by the client. By default: '0'.
	 * - @var boolean extended: Return friend request read_state field
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function areFriends(string $access_token, array $params = [])
	{
		return $this->request->post('friends.areFriends', $access_token, $params);
	}


	/**
	 * Declines a friend request or deletes a user from the current user's friend list.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer user_id: ID of the user whose friend request is to be declined or who is to be deleted from the current user's friend list.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function delete(string $access_token, array $params = [])
	{
		return $this->request->post('friends.delete', $access_token, $params);
	}


	/**
	 * Marks all incoming friend requests as viewed.
	 * @param string $access_token
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function deleteAllRequests(string $access_token)
	{
		return $this->request->post('friends.deleteAllRequests', $access_token);
	}


	/**
	 * Deletes a friend list of the current user.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer list_id: ID of the friend list to delete.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiFriendsListIdException Invalid list id
	 */
	public function deleteList(string $access_token, array $params = [])
	{
		return $this->request->post('friends.deleteList', $access_token, $params);
	}


	/**
	 * Edits the friend lists of the selected user.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer user_id: ID of the user whose friend list is to be edited.
	 * - @var array[integer] list_ids: IDs of the friend lists to which to add the user.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function edit(string $access_token, array $params = [])
	{
		return $this->request->post('friends.edit', $access_token, $params);
	}


	/**
	 * Edits a friend list of the current user.
	 * @param string $access_token
	 * @param array $params
	 * - @var string name: Name of the friend list.
	 * - @var integer list_id: Friend list ID.
	 * - @var array[integer] user_ids: IDs of users in the friend list.
	 * - @var array[integer] add_user_ids: (Applies if 'user_ids' parameter is not set.), User IDs to add to the friend list.
	 * - @var array[integer] delete_user_ids: (Applies if 'user_ids' parameter is not set.), User IDs to delete from the friend list.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiFriendsListIdException Invalid list id
	 */
	public function editList(string $access_token, array $params = [])
	{
		return $this->request->post('friends.editList', $access_token, $params);
	}


	/**
	 * Returns a list of user IDs or detailed information about a user's friends.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer user_id: User ID. By default, the current user ID.
	 * - @var FriendsOrder order: Sort order: , 'name' - by name (enabled only if the 'fields' parameter is used), 'hints' - by rating, similar to how friends are sorted in My friends section, , This parameter is available only for [vk.com/dev/standalone|desktop applications].
	 * - @var integer list_id: ID of the friend list returned by the [vk.com/dev/friends.getLists|friends.getLists] method to be used as the source. This parameter is taken into account only when the uid parameter is set to the current user ID. This parameter is available only for [vk.com/dev/standalone|desktop applications].
	 * - @var integer count: Number of friends to return.
	 * - @var integer offset: Offset needed to return a specific subset of friends.
	 * - @var array[FriendsFields] fields: Profile fields to return. Sample values: 'uid', 'first_name', 'last_name', 'nickname', 'sex', 'bdate' (birthdate), 'city', 'country', 'timezone', 'photo', 'photo_medium', 'photo_big', 'domain', 'has_mobile', 'rate', 'contacts', 'education'.
	 * - @var string ref
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function get(string $access_token, array $params = [])
	{
		return $this->request->post('friends.get', $access_token, $params);
	}


	/**
	 * Returns a list of IDs of the current user's friends who installed the application.
	 * @param string $access_token
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getAppUsers(string $access_token)
	{
		return $this->request->post('friends.getAppUsers', $access_token);
	}


	/**
	 * Returns a list of the current user's friends whose phone numbers, validated or specified in a profile, are in a given list.
	 * @param string $access_token
	 * @param array $params
	 * - @var array[string] phones: List of phone numbers in MSISDN format (maximum 1000). Example: "+79219876543,+79111234567"
	 * - @var array[FriendsFields] fields: Profile fields to return. Sample values: 'nickname', 'screen_name', 'sex', 'bdate' (birthdate), 'city', 'country', 'timezone', 'photo', 'photo_medium', 'photo_big', 'has_mobile', 'rate', 'contacts', 'education', 'online, counters'.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getByPhones(string $access_token, array $params = [])
	{
		return $this->request->post('friends.getByPhones', $access_token, $params);
	}


	/**
	 * Returns a list of the user's friend lists.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer user_id: User ID.
	 * - @var boolean return_system: '1' - to return system friend lists. By default: '0'.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getLists(string $access_token, array $params = [])
	{
		return $this->request->post('friends.getLists', $access_token, $params);
	}


	/**
	 * Returns a list of user IDs of the mutual friends of two users.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer source_uid: ID of the user whose friends will be checked against the friends of the user specified in 'target_uid'.
	 * - @var integer target_uid: ID of the user whose friends will be checked against the friends of the user specified in 'source_uid'.
	 * - @var array[integer] target_uids: IDs of the users whose friends will be checked against the friends of the user specified in 'source_uid'.
	 * - @var string order: Sort order: 'random' - random order
	 * - @var integer count: Number of mutual friends to return.
	 * - @var integer offset: Offset needed to return a specific subset of mutual friends.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getMutual(string $access_token, array $params = [])
	{
		return $this->request->post('friends.getMutual', $access_token, $params);
	}


	/**
	 * Returns a list of user IDs of a user's friends who are online.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer user_id: User ID.
	 * - @var integer list_id: Friend list ID. If this parameter is not set, information about all online friends is returned.
	 * - @var boolean online_mobile: '1' - to return an additional 'online_mobile' field, '0' - (default),
	 * - @var string order: Sort order: 'random' - random order
	 * - @var integer count: Number of friends to return.
	 * - @var integer offset: Offset needed to return a specific subset of friends.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getOnline(string $access_token, array $params = [])
	{
		return $this->request->post('friends.getOnline', $access_token, $params);
	}


	/**
	 * Returns a list of user IDs of the current user's recently added friends.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer count: Number of recently added friends to return.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getRecent(string $access_token, array $params = [])
	{
		return $this->request->post('friends.getRecent', $access_token, $params);
	}


	/**
	 * Returns information about the current user's incoming and outgoing friend requests.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer offset: Offset needed to return a specific subset of friend requests.
	 * - @var integer count: Number of friend requests to return (default 100, maximum 1000).
	 * - @var boolean extended: '1' - to return response messages from users who have sent a friend request or, if 'suggested' is set to '1', to return a list of suggested friends
	 * - @var boolean need_mutual: '1' - to return a list of mutual friends (up to 20), if any
	 * - @var boolean out: '1' - to return outgoing requests, '0' - to return incoming requests (default)
	 * - @var FriendsSort sort: Sort order: '1' - by number of mutual friends, '0' - by date
	 * - @var boolean need_viewed
	 * - @var boolean suggested: '1' - to return a list of suggested friends, '0' - to return friend requests (default)
	 * - @var string ref
	 * - @var array[FriendsFields] fields
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getRequests(string $access_token, array $params = [])
	{
		return $this->request->post('friends.getRequests', $access_token, $params);
	}


	/**
	 * Returns a list of profiles of users whom the current user may know.
	 * @param string $access_token
	 * @param array $params
	 * - @var array[FriendsFilter] filter: Types of potential friends to return: 'mutual' - users with many mutual friends , 'contacts' - users found with the [vk.com/dev/account.importContacts|account.importContacts] method , 'mutual_contacts' - users who imported the same contacts as the current user with the [vk.com/dev/account.importContacts|account.importContacts] method
	 * - @var integer count: Number of suggestions to return.
	 * - @var integer offset: Offset needed to return a specific subset of suggestions.
	 * - @var array[FriendsFields] fields: Profile fields to return. Sample values: 'nickname', 'screen_name', 'sex', 'bdate' (birthdate), 'city', 'country', 'timezone', 'photo', 'photo_medium', 'photo_big', 'has_mobile', 'rate', 'contacts', 'education', 'online', 'counters'.
	 * - @var NameCase name_case: Case for declension of user name and surname: , 'nom' - nominative (default) , 'gen' - genitive , 'dat' - dative , 'acc' - accusative , 'ins' - instrumental , 'abl' - prepositional
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getSuggestions(string $access_token, array $params = [])
	{
		return $this->request->post('friends.getSuggestions', $access_token, $params);
	}


	/**
	 * Returns a list of friends matching the search criteria.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer user_id: User ID.
	 * - @var string q: Search query string (e.g., 'Vasya Babich').
	 * - @var array[FriendsFields] fields: Profile fields to return. Sample values: 'nickname', 'screen_name', 'sex', 'bdate' (birthdate), 'city', 'country', 'timezone', 'photo', 'photo_medium', 'photo_big', 'has_mobile', 'rate', 'contacts', 'education', 'online',
	 * - @var NameCase name_case: Case for declension of user name and surname: 'nom' - nominative (default), 'gen' - genitive , 'dat' - dative, 'acc' - accusative , 'ins' - instrumental , 'abl' - prepositional
	 * - @var integer offset: Offset needed to return a specific subset of friends.
	 * - @var integer count: Number of friends to return.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function search(string $access_token, array $params = [])
	{
		return $this->request->post('friends.search', $access_token, $params);
	}
}

