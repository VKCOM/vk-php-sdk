<?php

namespace VK\Actions;

use VK\Client\Actions\ActionInterface;
use VK\Client\VKApiRequest;
use VK\Enums\DocsGetMessagesUploadServerType;
use VK\Enums\DocsGetType;
use VK\Exceptions\Api\VKApiMessagesDenySendException;
use VK\Exceptions\Api\VKApiParamDocAccessException;
use VK\Exceptions\Api\VKApiParamDocDeleteAccessException;
use VK\Exceptions\Api\VKApiParamDocIdException;
use VK\Exceptions\Api\VKApiParamDocRestoreAccessException;
use VK\Exceptions\Api\VKApiParamDocRestoreTimeoutException;
use VK\Exceptions\Api\VKApiParamDocTitleException;
use VK\Exceptions\Api\VKApiSaveFileException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

class Docs implements ActionInterface
{
	/** @param VKApiRequest $request */
	private VKApiRequest $request;


	/**
	 * Docs constructor.
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request)
	{
		$this->request = $request;
	}


	/**
	 * Copies a document to a user's or community's document list.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer owner_id: ID of the user or community that owns the document. Use a negative value to designate a community ID.
	 * - @var integer doc_id: Document ID.
	 * - @var string access_key: Access key. This parameter is required if 'access_key' was returned with the document's data.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function add(string $access_token, array $params = [])
	{
		return $this->request->post('docs.add', $access_token, $params);
	}


	/**
	 * Deletes a user or community document.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer owner_id: ID of the user or community that owns the document. Use a negative value to designate a community ID.
	 * - @var integer doc_id: Document ID.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiParamDocDeleteAccessException Access to document deleting is denied
	 * @throws VKApiParamDocIdException Invalid document id
	 */
	public function delete(string $access_token, array $params = [])
	{
		return $this->request->post('docs.delete', $access_token, $params);
	}


	/**
	 * Edits a document.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer owner_id: User ID or community ID. Use a negative value to designate a community ID.
	 * - @var integer doc_id: Document ID.
	 * - @var string title: Document title.
	 * - @var array[string] tags: Document tags.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiParamDocAccessException Access to document is denied
	 * @throws VKApiParamDocIdException Invalid document id
	 * @throws VKApiParamDocTitleException Invalid document title
	 */
	public function edit(string $access_token, array $params = [])
	{
		return $this->request->post('docs.edit', $access_token, $params);
	}


	/**
	 * Returns detailed information about user or community documents.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer count: Number of documents to return. By default, all documents.
	 * - @var integer offset: Offset needed to return a specific subset of documents.
	 * - @var DocsGetType type
	 * - @var integer owner_id: ID of the user or community that owns the documents. Use a negative value to designate a community ID.
	 * - @var boolean return_tags
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function get(string $access_token, array $params = [])
	{
		return $this->request->post('docs.get', $access_token, $params);
	}


	/**
	 * Returns information about documents by their IDs.
	 * @param string $access_token
	 * @param array $params
	 * - @var array[string] docs: Document IDs. Example: , "66748_91488,66748_91455",
	 * - @var boolean return_tags
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getById(string $access_token, array $params = [])
	{
		return $this->request->post('docs.getById', $access_token, $params);
	}


	/**
	 * Returns the server address for document upload.
	 * @param string $access_token
	 * @param array $params
	 * - @var DocsGetMessagesUploadServerType type: Document type.
	 * - @var integer peer_id: Destination ID. "For user: 'User ID', e.g. '12345'. For chat: '2000000000' + 'Chat ID', e.g. '2000000001'. For community: '- Community ID', e.g. '-12345'. "
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiMessagesDenySendException Can't send messages for users without permission
	 */
	public function getMessagesUploadServer(string $access_token, array $params = [])
	{
		return $this->request->post('docs.getMessagesUploadServer', $access_token, $params);
	}


	/**
	 * Returns documents types available for current user.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer owner_id: ID of the user or community that owns the documents. Use a negative value to designate a community ID.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getTypes(string $access_token, array $params = [])
	{
		return $this->request->post('docs.getTypes', $access_token, $params);
	}


	/**
	 * Returns the server address for document upload.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id: Community ID (if the document will be uploaded to the community).
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getUploadServer(string $access_token, array $params = [])
	{
		return $this->request->post('docs.getUploadServer', $access_token, $params);
	}


	/**
	 * Returns the server address for document upload onto a user's or community's wall.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id: Community ID (if the document will be uploaded to the community).
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getWallUploadServer(string $access_token, array $params = [])
	{
		return $this->request->post('docs.getWallUploadServer', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer owner_id
	 * - @var integer doc_id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiParamDocRestoreAccessException Access to document restoring is denied
	 * @throws VKApiParamDocRestoreTimeoutException Document was deleted too long ago
	 */
	public function restore(string $access_token, array $params = [])
	{
		return $this->request->post('docs.restore', $access_token, $params);
	}


	/**
	 * Saves a document after [vk.com/dev/upload_files_2|uploading it to a server].
	 * @param string $access_token
	 * @param array $params
	 * - @var string file: This parameter is returned when the file is [vk.com/dev/upload_files_2|uploaded to the server].
	 * - @var string title: Document title.
	 * - @var string tags: Document tags.
	 * - @var boolean return_tags
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiSaveFileException Couldn't save file
	 */
	public function save(string $access_token, array $params = [])
	{
		return $this->request->post('docs.save', $access_token, $params);
	}


	/**
	 * Returns a list of documents matching the search criteria.
	 * @param string $access_token
	 * @param array $params
	 * - @var string q: Search query string.
	 * - @var boolean search_own
	 * - @var integer count: Number of results to return.
	 * - @var integer offset: Offset needed to return a specific subset of results.
	 * - @var boolean return_tags
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function search(string $access_token, array $params = [])
	{
		return $this->request->post('docs.search', $access_token, $params);
	}
}

