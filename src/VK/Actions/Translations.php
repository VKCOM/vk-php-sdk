<?php

namespace VK\Actions;

use VK\Client\Actions\ActionInterface;
use VK\Client\VKApiRequest;
use VK\Exceptions\Api\VKApiTranslationsCantTranslateException;
use VK\Exceptions\Api\VKApiTranslationsMultipleSourceLangException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

class Translations implements ActionInterface
{
	/** @param VKApiRequest $request */
	private VKApiRequest $request;


	/**
	 * Translations constructor.
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request)
	{
		$this->request = $request;
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var array[string] texts
	 * - @var string translation_language
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiTranslationsCantTranslateException Can't translate.
	 * @throws VKApiTranslationsMultipleSourceLangException Multiple source languages. Only one allowed.
	 */
	public function translate(string $access_token, array $params = [])
	{
		return $this->request->post('translations.translate', $access_token, $params);
	}
}

