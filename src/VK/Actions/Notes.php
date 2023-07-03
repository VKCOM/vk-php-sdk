<?php

namespace VK\Actions;

use VK\Client\Actions\ActionInterface;
use VK\Client\VKApiRequest;
use VK\Enums\NotesSort;
use VK\Exceptions\Api\VKApiAccessCommentException;
use VK\Exceptions\Api\VKApiAccessNoteCommentException;
use VK\Exceptions\Api\VKApiAccessNoteException;
use VK\Exceptions\Api\VKApiParamNoteIdException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

class Notes implements ActionInterface
{
	/** @param VKApiRequest $request */
	private VKApiRequest $request;


	/**
	 * Notes constructor.
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request)
	{
		$this->request = $request;
	}


	/**
	 * Creates a new note for the current user.
	 * @param string $access_token
	 * @param array $params
	 * - @var string title: Note title.
	 * - @var string text: Note text.
	 * - @var array[string] privacy_view
	 * - @var array[string] privacy_comment
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function add(string $access_token, array $params = [])
	{
		return $this->request->post('notes.add', $access_token, $params);
	}


	/**
	 * Adds a new comment on a note.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer note_id: Note ID.
	 * - @var integer owner_id: Note owner ID.
	 * - @var integer reply_to: ID of the user to whom the reply is addressed (if the comment is a reply to another comment).
	 * - @var string message: Comment text.
	 * - @var string guid
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAccessNoteException Access to note denied
	 * @throws VKApiAccessNoteCommentException You can't comment this note
	 */
	public function createComment(string $access_token, array $params = [])
	{
		return $this->request->post('notes.createComment', $access_token, $params);
	}


	/**
	 * Deletes a note of the current user.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer note_id: Note ID.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiParamNoteIdException Note not found
	 */
	public function delete(string $access_token, array $params = [])
	{
		return $this->request->post('notes.delete', $access_token, $params);
	}


	/**
	 * Deletes a comment on a note.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer comment_id: Comment ID.
	 * - @var integer owner_id: Note owner ID.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAccessNoteException Access to note denied
	 * @throws VKApiAccessCommentException Access to comment denied
	 */
	public function deleteComment(string $access_token, array $params = [])
	{
		return $this->request->post('notes.deleteComment', $access_token, $params);
	}


	/**
	 * Edits a note of the current user.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer note_id: Note ID.
	 * - @var string title: Note title.
	 * - @var string text: Note text.
	 * - @var array[string] privacy_view
	 * - @var array[string] privacy_comment
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiParamNoteIdException Note not found
	 */
	public function edit(string $access_token, array $params = [])
	{
		return $this->request->post('notes.edit', $access_token, $params);
	}


	/**
	 * Edits a comment on a note.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer comment_id: Comment ID.
	 * - @var integer owner_id: Note owner ID.
	 * - @var string message: New comment text.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAccessCommentException Access to comment denied
	 */
	public function editComment(string $access_token, array $params = [])
	{
		return $this->request->post('notes.editComment', $access_token, $params);
	}


	/**
	 * Returns a list of notes created by a user.
	 * @param string $access_token
	 * @param array $params
	 * - @var array[integer] note_ids: Note IDs.
	 * - @var integer user_id: Note owner ID.
	 * - @var integer offset
	 * - @var integer count: Number of notes to return.
	 * - @var NotesSort sort
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiParamNoteIdException Note not found
	 */
	public function get(string $access_token, array $params = [])
	{
		return $this->request->post('notes.get', $access_token, $params);
	}


	/**
	 * Returns a note by its ID.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer note_id: Note ID.
	 * - @var integer owner_id: Note owner ID.
	 * - @var boolean need_wiki
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAccessNoteException Access to note denied
	 * @throws VKApiParamNoteIdException Note not found
	 */
	public function getById(string $access_token, array $params = [])
	{
		return $this->request->post('notes.getById', $access_token, $params);
	}


	/**
	 * Returns a list of comments on a note.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer note_id: Note ID.
	 * - @var integer owner_id: Note owner ID.
	 * - @var NotesSort sort
	 * - @var integer offset
	 * - @var integer count: Number of comments to return.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAccessNoteException Access to note denied
	 */
	public function getComments(string $access_token, array $params = [])
	{
		return $this->request->post('notes.getComments', $access_token, $params);
	}


	/**
	 * Restores a deleted comment on a note.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer comment_id: Comment ID.
	 * - @var integer owner_id: Note owner ID.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAccessCommentException Access to comment denied
	 */
	public function restoreComment(string $access_token, array $params = [])
	{
		return $this->request->post('notes.restoreComment', $access_token, $params);
	}
}

