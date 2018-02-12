<?php

namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\VKClientException;
use VK\Exceptions\Api\VKApiException;

class Notes {

    /**
     * @var VKApiRequest
     **/
    private $request;

    /**
     * Notes constructor.
     * @param VKApiRequest $request
     */
    public function __construct(VKApiRequest $request) {
        $this->request = $request;
    }

    /**
     * Returns a list of notes created by a user.
     * 
     * @param $access_token string
     * @param $params array
     *      - array note_ids: Note IDs.
     *      - integer user_id: Note owner ID.
     *      - integer count: Number of notes to return.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function get(string $access_token, array $params = array()) {
        return $this->request->post('notes.get', $access_token, $params);
    }

    /**
     * Returns a note by its ID.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer note_id: Note ID.
     *      - integer owner_id: Note owner ID.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getById(string $access_token, array $params = array()) {
        return $this->request->post('notes.getById', $access_token, $params);
    }

    /**
     * Creates a new note for the current user.
     * 
     * @param $access_token string
     * @param $params array
     *      - string title: Note title.
     *      - string text: Note text.
     *      - array privacy_view:
     *      - array privacy_comment:
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function add(string $access_token, array $params = array()) {
        return $this->request->post('notes.add', $access_token, $params);
    }

    /**
     * Edits a note of the current user.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer note_id: Note ID.
     *      - string title: Note title.
     *      - string text: Note text.
     *      - array privacy_view:
     *      - array privacy_comment:
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function edit(string $access_token, array $params = array()) {
        return $this->request->post('notes.edit', $access_token, $params);
    }

    /**
     * Deletes a note of the current user.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer note_id: Note ID.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function delete(string $access_token, array $params = array()) {
        return $this->request->post('notes.delete', $access_token, $params);
    }

    /**
     * Returns a list of comments on a note.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer note_id: Note ID.
     *      - integer owner_id: Note owner ID.
     *      - integer count: Number of comments to return.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getComments(string $access_token, array $params = array()) {
        return $this->request->post('notes.getComments', $access_token, $params);
    }

    /**
     * Adds a new comment on a note.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer note_id: Note ID.
     *      - integer owner_id: Note owner ID.
     *      - integer reply_to: ID of the user to whom the reply is addressed (if the comment is a reply to another
     *        comment).
     *      - string message: Comment text.
     *      - string guid:
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function createComment(string $access_token, array $params = array()) {
        return $this->request->post('notes.createComment', $access_token, $params);
    }

    /**
     * Edits a comment on a note.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer comment_id: Comment ID.
     *      - integer owner_id: Note owner ID.
     *      - string message: New comment text.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function editComment(string $access_token, array $params = array()) {
        return $this->request->post('notes.editComment', $access_token, $params);
    }

    /**
     * Deletes a comment on a note.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer comment_id: Comment ID.
     *      - integer owner_id: Note owner ID.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function deleteComment(string $access_token, array $params = array()) {
        return $this->request->post('notes.deleteComment', $access_token, $params);
    }

    /**
     * Restores a deleted comment on a note.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer comment_id: Comment ID.
     *      - integer owner_id: Note owner ID.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function restoreComment(string $access_token, array $params = array()) {
        return $this->request->post('notes.restoreComment', $access_token, $params);
    }
}
