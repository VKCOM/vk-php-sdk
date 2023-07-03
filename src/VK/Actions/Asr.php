<?php

namespace VK\Actions;

use VK\Client\Actions\ActionInterface;
use VK\Client\VKApiRequest;
use VK\Enums\AsrModel;
use VK\Exceptions\Api\VKApiAsrAudioDurationFloodedException;
use VK\Exceptions\Api\VKApiAsrFileIsTooBigException;
use VK\Exceptions\Api\VKApiAsrInvalidHashException;
use VK\Exceptions\Api\VKApiAsrNotFoundException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

class Asr implements ActionInterface
{
	/** @param VKApiRequest $request */
	private VKApiRequest $request;


	/**
	 * Asr constructor.
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request)
	{
		$this->request = $request;
	}


	/**
	 * Returns status of the task with provided `task_id`
	 * @param string $access_token
	 * @param array $params
	 * - @var string task_id: ID of ASR task in UUID format.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAsrNotFoundException Task not found
	 */
	public function checkStatus(string $access_token, array $params = [])
	{
		return $this->request->post('asr.checkStatus', $access_token, $params);
	}


	/**
	 * Returns the server address to [vk.com/dev/upload_files_2|upload audio files].
	 * @param string $access_token
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getUploadUrl(string $access_token)
	{
		return $this->request->post('asr.getUploadUrl', $access_token);
	}


	/**
	 * Starts ASR task on [vk.com/dev/upload_files_2|uploaded audio file].
	 * @param string $access_token
	 * @param array $params
	 * - @var string audio: This parameter is a JSON response returned from [vk.com/dev/upload_files_2|file uploading server].
	 * - @var AsrModel model: Which model to use for recognition. `neutral` -- general purpose (interviews, TV shows, etc.), `spontaneous` -- for NSFW audios (slang, profanity, etc.)
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAsrFileIsTooBigException Audio file is too big
	 * @throws VKApiAsrAudioDurationFloodedException Total audio duration limit reached
	 * @throws VKApiAsrInvalidHashException Invalid hash
	 */
	public function process(string $access_token, array $params = [])
	{
		return $this->request->post('asr.process', $access_token, $params);
	}
}

