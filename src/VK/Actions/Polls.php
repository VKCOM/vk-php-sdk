<?php

namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\VKClientException;
use VK\Exceptions\Api\VKApiException;
use VK\Actions\Enums\PollsGetVotersNameCase;

class Polls {

    /**
     * @var VKApiRequest
     **/
    private $request;

    /**
     * Polls constructor.
     * @param VKApiRequest $request
     */
    public function __construct(VKApiRequest $request) {
        $this->request = $request;
    }

    /**
     * Returns detailed information about a poll by its ID.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of the user or community that owns the poll. Use a negative value to designate a
     *        community ID.
     *      - boolean is_board: '1' – poll is in a board, '0' – poll is on a wall. '0' by default.
     *      - integer poll_id: Poll ID.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getById(string $access_token, array $params = array()) {
        return $this->request->post('polls.getById', $access_token, $params);
    }

    /**
     * Adds the current user's vote to the selected answer in the poll.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of the user or community that owns the poll. Use a negative value to designate a
     *        community ID.
     *      - integer poll_id: Poll ID.
     *      - integer answer_id: Answer ID.
     *      - boolean is_board:
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function addVote(string $access_token, array $params = array()) {
        return $this->request->post('polls.addVote', $access_token, $params);
    }

    /**
     * Deletes the current user's vote from the selected answer in the poll.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of the user or community that owns the poll. Use a negative value to designate a
     *        community ID.
     *      - integer poll_id: Poll ID.
     *      - integer answer_id: Answer ID.
     *      - boolean is_board:
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function deleteVote(string $access_token, array $params = array()) {
        return $this->request->post('polls.deleteVote', $access_token, $params);
    }

    /**
     * Returns a list of IDs of users who selected specific answers in the poll.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of the user or community that owns the poll. Use a negative value to designate a
     *        community ID.
     *      - integer poll_id: Poll ID.
     *      - array answer_ids: Answer IDs.
     *      - boolean is_board:
     *      - boolean friends_only: '1' — to return only current user's friends, '0' — to return all users
     *        (default),
     *      - integer offset: Offset needed to return a specific subset of voters. '0' — (default)
     *      - integer count: Number of user IDs to return (if the 'friends_only' parameter is not set, maximum
     *        '1000', otherwise '10'). '100' — (default)
     *      - array fields: Profile fields to return. Sample values: 'nickname', 'screen_name', 'sex', 'bdate
     *        (birthdate)', 'city', 'country', 'timezone', 'photo', 'photo_medium', 'photo_big', 'has_mobile', 'rate',
     *        'contacts', 'education', 'online', 'counters'.
     *      - PollsGetVotersNameCase name_case: Case for declension of user name and surname: , 'nom' —
     *        nominative (default) , 'gen' — genitive , 'dat' — dative , 'acc' — accusative , 'ins' — instrumental
     *        , 'abl' — prepositional
     *        @see PollsGetVotersNameCase
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getVoters(string $access_token, array $params = array()) {
        return $this->request->post('polls.getVoters', $access_token, $params);
    }

    /**
     * Creates polls that can be attached to the users' or communities' posts.
     * 
     * @param $access_token string
     * @param $params array
     *      - string question: question text
     *      - boolean is_anonymous: '1' – anonymous poll, participants list is hidden,, '0' – public poll,
     *        participants list is available,, Default value is '0'.
     *      - integer owner_id: If a poll will be added to a communty it is required to send a negative group
     *        identifier. Current user by default.
     *      - string add_answers: available answers list, for example: " ["yes","no","maybe"]", There can be from 1
     *        to 10 answers.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function create(string $access_token, array $params = array()) {
        return $this->request->post('polls.create', $access_token, $params);
    }

    /**
     * Edits created polls
     * 
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: poll owner id
     *      - integer poll_id: edited poll's id
     *      - string question: new question text
     *      - string add_answers: answers list, for example: , "["yes","no","maybe"]"
     *      - string edit_answers: object containing answers that need to be edited,, key – answer id, value –
     *        new answer text. Example: {"382967099":"option1", "382967103":"option2"}"
     *      - string delete_answers: list of answer ids to be deleted. For example: "[382967099, 382967103]"
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function edit(string $access_token, array $params = array()) {
        return $this->request->post('polls.edit', $access_token, $params);
    }
}
