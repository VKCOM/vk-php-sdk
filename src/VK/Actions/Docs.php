<?php

namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\VKClientException;
use VK\Exceptions\Api\VKApiException;

class Docs {

    /**
     * @var VKApiRequest
     **/
    private $request;

    /**
     * Docs constructor.
     * @param VKApiRequest $request
     */
    public function __construct(VKApiRequest $request) {
        $this->request = $request;
    }

    /**
     * Returns detailed information about user or community documents.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer count: Number of documents to return. By default, all documents.
     *      - integer offset: Offset needed to return a specific subset of documents.
     *      - integer owner_id: ID of the user or community that owns the documents. Use a negative value to
     *        designate a community ID.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function get(string $access_token, array $params = array()) {
        return $this->request->post('docs.get', $access_token, $params);
    }

    /**
     * Returns information about documents by their IDs.
     * 
     * @param $access_token string
     * @param $params array
     *      - array docs: Document IDs. Example: , "66748_91488,66748_91455",
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getById(string $access_token, array $params = array()) {
        return $this->request->post('docs.getById', $access_token, $params);
    }

    /**
     * Returns the server address for document upload.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer group_id: Community ID (if the document will be uploaded to the community).
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getUploadServer(string $access_token, array $params = array()) {
        return $this->request->post('docs.getUploadServer', $access_token, $params);
    }

    /**
     * Returns the server address for document upload onto a user's or community's wall.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer group_id: Community ID (if the document will be uploaded to the community).
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getWallUploadServer(string $access_token, array $params = array()) {
        return $this->request->post('docs.getWallUploadServer', $access_token, $params);
    }

    /**
     * Saves a document after [vk.com/dev/upload_files_2|uploading it to a server].
     * 
     * @param $access_token string
     * @param $params array
     *      - string file: This parameter is returned when the file is [vk.com/dev/upload_files_2|uploaded to the
     *        server].
     *      - string title: Document title.
     *      - string tags: Document tags.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function save(string $access_token, array $params = array()) {
        return $this->request->post('docs.save', $access_token, $params);
    }

    /**
     * Deletes a user or community document.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of the user or community that owns the document. Use a negative value to
     *        designate a community ID.
     *      - integer doc_id: Document ID.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function delete(string $access_token, array $params = array()) {
        return $this->request->post('docs.delete', $access_token, $params);
    }

    /**
     * Copies a document to a user's or community's document list.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of the user or community that owns the document. Use a negative value to
     *        designate a community ID.
     *      - integer doc_id: Document ID.
     *      - string access_key: Access key. This parameter is required if 'access_key' was returned with the
     *        document's data.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function add(string $access_token, array $params = array()) {
        return $this->request->post('docs.add', $access_token, $params);
    }

    /**
     * Returns documents types available for current user.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of the user or community that owns the documents. Use a negative value to
     *        designate a community ID.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getTypes(string $access_token, array $params = array()) {
        return $this->request->post('docs.getTypes', $access_token, $params);
    }

    /**
     * Returns a list of documents matching the search criteria.
     * 
     * @param $access_token string
     * @param $params array
     *      - string q: Search query string.
     *      - integer count: Number of results to return.
     *      - integer offset: Offset needed to return a specific subset of results.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function search(string $access_token, array $params = array()) {
        return $this->request->post('docs.search', $access_token, $params);
    }

    /**
     * Edits a document.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: User ID or community ID. Use a negative value to designate a community ID.
     *      - integer doc_id: Document ID.
     *      - string title: Document title.
     *      - array tags: Document tags.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function edit(string $access_token, array $params = array()) {
        return $this->request->post('docs.edit', $access_token, $params);
    }
}
