<?php

namespace VK\TransportClient\Curl;

use VK\TransportClient\TransportClient;
use VK\TransportClient\TransportClientResponse;
use VK\TransportClient\TransportRequestException;
use Bitrix\Main\Web\HttpClient;
use Bitrix\Main\Web\HttpHeaders;

class CurlHttpClient implements TransportClient {

    protected const HEADER_UPLOAD_CONTENT_TYPE = 'Content-Type: multipart/form-data';
    protected const QUESTION_MARK = '?';

	/**
	 * @var array
	 */
	protected $initial_opts;

    /**
     * CurlHttpClient constructor.
     * @param int $connection_timeout
     */
    public function __construct(int $connection_timeout)
    {
	    $this->initial_opts = [
		    'socketTimeout' => $connection_timeout,
	    ];
    }

    public function getHttpClient()
    {
    	return new HttpClient($this->initial_opts);
    }

	private function getHeaders(HttpClient $httpClient)
	{
		$result = [];
		foreach ($httpClient->getHeaders() as $k => $v)
		{
			if (is_array($v))
			{
				foreach ($v as $vv)
				{
					// NOTE делаем результат как в парсере заголовов vk-php-sdk
					$result[$k] = $vv;
				}
			}
			else
			{
				$result[$k] = $v;
			}
		}
		return [$httpClient->getStatus(), $result];
	}

	private function checkErrors(HttpClient $httpClient)
	{
		$errors = $httpClient->getError();
		if (count($errors) == 0)
		{
			return;
		}
		$result = [];
		foreach ($errors as $k => $v) {
			$result[] = "Failed http request. Error $k: $v";
		}
		throw new TransportRequestException(implode("\n", $result));
	}

    /**
     * Makes post request.
     *
     * @param string $url
     * @param array|null $payload
     *
     * @return TransportClientResponse
     * @throws TransportRequestException
     */
    public function post(string $url, ?array $payload = null): TransportClientResponse {
    	\Bitrix\Main\Diag\Debug::writeToFile($payload, $url);
	    $httpClient = $this->getHttpClient();
    	$res = $httpClient->post($url, $payload);
    	$this->checkErrors($httpClient);
    	return new TransportClientResponse(
	    	$httpClient->getStatus(),
		    $this->getHeaders($httpClient),
		    $res
	    );
    }

    /**
     * Makes get request.
     *
     * @param string $url
     * @param array|null $payload
     *
     * @return TransportClientResponse
     * @throws TransportRequestException
     */
    public function get(string $url, ?array $payload = null): TransportClientResponse {
	    \Bitrix\Main\Diag\Debug::writeToFile($payload, $url);
	    $httpClient = $this->getHttpClient();
	    $res = $httpClient->get($url . static::QUESTION_MARK . http_build_query($payload));
	    $this->checkErrors($httpClient);
	    return new TransportClientResponse(
		    $httpClient->getStatus(),
		    $this->getHeaders($httpClient),
		    $res
	    );
    }

    /**
     * Makes upload request.
     *
     * @param string $url
     * @param string $parameter_name
     * @param string $path
     *
     * @return TransportClientResponse
     * @throws TransportRequestException
     */
    public function upload(string $url, string $parameter_name, string $path): TransportClientResponse {
    	$payload = [
		    $parameter_name => [
			    'resource' => fopen($path, 'r'),
			    //'content' => file_get_contents($path),

			    // дополнительные параметры
			    // 'content' => содержимое файла
			    // 'filename' => название файла
			    // 'contentType' => тип
		    ]
	    ];

	    \Bitrix\Main\Diag\Debug::writeToFile([$payload, $url, $parameter_name, $path], __METHOD__);

	    $httpClient = $this->getHttpClient();
	    $res = $httpClient->post($url, $payload, true);
	    $this->checkErrors($httpClient);
	    return new TransportClientResponse(
		    $httpClient->getStatus(),
		    $this->getHeaders($httpClient),
		    $res
	    );
    }
}
