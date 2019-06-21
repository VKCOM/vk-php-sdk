<?php
namespace VK\Actions;

use VK\Actions\Enums\PollsBackgroundId;
use VK\Actions\Enums\PollsNameCase;
use VK\Client\VKApiRequest;
use VK\Exceptions\Api\VKApiPollsAccessException;
use VK\Exceptions\Api\VKApiPollsAccessWithoutVoteException;
use VK\Exceptions\Api\VKApiPollsAnswerIdException;
use VK\Exceptions\Api\VKApiPollsPollIdException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

/**
 */
class Polls {

	/**
	 * @var VKApiRequest
	 */
	private $request;

	/**
	 * Polls constructor.
	 *
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request) {
		$this->request = $request;
	}

	/**
	 * Adds the current user's vote to the selected answer in the poll.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: ID of the user or community that owns the poll. Use a negative value to designate a community ID.
	 * - @var integer poll_id: Poll ID.
	 * - @var array[integer] answer_ids
	 * - @var boolean is_board
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiPollsAccessException Access to poll denied
	 * @throws VKApiPollsAnswerIdException Invalid answer id
	 * @throws VKApiPollsPollIdException Invalid poll id
	 * @return mixed
	 */
	public function addVote($access_token, array $params = []) {
		return $this->request->post('polls.addVote', $access_token, $params);
	}

	/**
	 * Creates polls that can be attached to the users' or communities' posts.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var string question: question text
	 * - @var boolean is_anonymous: '1' – anonymous poll, participants list is hidden,, '0' – public poll, participants list is available,, Default value is '0'.
	 * - @var boolean is_multiple
	 * - @var integer end_date
	 * - @var integer owner_id: If a poll will be added to a communty it is required to send a negative group identifier. Current user by default.
	 * - @var string add_answers: available answers list, for example: " ["yes","no","maybe"]", There can be from 1 to 10 answers.
	 * - @var integer photo_id
	 * - @var PollsBackgroundId background_id
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function create($access_token, array $params = []) {
		return $this->request->post('polls.create', $access_token, $params);
	}

	/**
	 * Deletes the current user's vote from the selected answer in the poll.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: ID of the user or community that owns the poll. Use a negative value to designate a community ID.
	 * - @var integer poll_id: Poll ID.
	 * - @var integer answer_id: Answer ID.
	 * - @var boolean is_board
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiPollsAccessException Access to poll denied
	 * @throws VKApiPollsAnswerIdException Invalid answer id
	 * @throws VKApiPollsPollIdException Invalid poll id
	 * @return mixed
	 */
	public function deleteVote($access_token, array $params = []) {
		return $this->request->post('polls.deleteVote', $access_token, $params);
	}

	/**
	 * Edits created polls
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: poll owner id
	 * - @var integer poll_id: edited poll's id
	 * - @var string question: new question text
	 * - @var string add_answers: answers list, for example: , "["yes","no","maybe"]"
	 * - @var string edit_answers: object containing answers that need to be edited,, key – answer id, value – new answer text. Example: {"382967099":"option1", "382967103":"option2"}"
	 * - @var string delete_answers: list of answer ids to be deleted. For example: "[382967099, 382967103]"
	 * - @var integer end_date
	 * - @var integer photo_id
	 * - @var PollsBackgroundId background_id
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function edit($access_token, array $params = []) {
		return $this->request->post('polls.edit', $access_token, $params);
	}

	/**
	 * Returns detailed information about a poll by its ID.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: ID of the user or community that owns the poll. Use a negative value to designate a community ID.
	 * - @var boolean is_board: '1' – poll is in a board, '0' – poll is on a wall. '0' by default.
	 * - @var integer poll_id: Poll ID.
	 * - @var boolean extended
	 * - @var integer friends_count
	 * - @var array[string] fields
	 * - @var PollsNameCase name_case
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiPollsAccessException Access to poll denied
	 * @return mixed
	 */
	public function getById($access_token, array $params = []) {
		return $this->request->post('polls.getById', $access_token, $params);
	}

	/**
	 * Returns a list of IDs of users who selected specific answers in the poll.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: ID of the user or community that owns the poll. Use a negative value to designate a community ID.
	 * - @var integer poll_id: Poll ID.
	 * - @var array[integer] answer_ids: Answer IDs.
	 * - @var boolean is_board
	 * - @var boolean friends_only: '1' — to return only current user's friends, '0' — to return all users (default),
	 * - @var integer offset: Offset needed to return a specific subset of voters. '0' — (default)
	 * - @var integer count: Number of user IDs to return (if the 'friends_only' parameter is not set, maximum '1000', otherwise '10'). '100' — (default)
	 * - @var array[PollsFields] fields: Profile fields to return. Sample values: 'nickname', 'screen_name', 'sex', 'bdate (birthdate)', 'city', 'country', 'timezone', 'photo', 'photo_medium', 'photo_big', 'has_mobile', 'rate', 'contacts', 'education', 'online', 'counters'.
	 * - @var PollsNameCase name_case: Case for declension of user name and surname: , 'nom' — nominative (default) , 'gen' — genitive , 'dat' — dative , 'acc' — accusative , 'ins' — instrumental , 'abl' — prepositional
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiPollsAccessException Access to poll denied
	 * @throws VKApiPollsAnswerIdException Invalid answer id
	 * @throws VKApiPollsPollIdException Invalid poll id
	 * @throws VKApiPollsAccessWithoutVoteException Access denied, please vote first
	 * @return mixed
	 */
	public function getVoters($access_token, array $params = []) {
		return $this->request->post('polls.getVoters', $access_token, $params);
	}
}
