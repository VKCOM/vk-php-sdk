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
     * @var HttpClient
     */
    protected $httpClient;

    /**
     * CurlHttpClient constructor.
     * @param int $connection_timeout
     */
    public function __construct(int $connection_timeout) {
    	// TODO создавать инстанс в методе get post upload
        $this->httpClient = new HttpClient([
		    'socketTimeout' => $connection_timeout,
	    ]);
    }

	private function getHeaders()
	{
		$result = [];
		foreach ($this->httpClient->getHeaders() as $k => $v)
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
		return [$this->httpClient->getStatus(), $result];
	}

	private function checkErrors()
	{
		$errors = $this->httpClient->getError();
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
	    //\Bitrix\Main\Diag\Debug::writeToFile(debug_backtrace(), $url);
    	$res = $this->httpClient->post($url, $payload);
    	$this->checkErrors();
    	return new TransportClientResponse(
	    	$this->httpClient->getStatus(),
		    $this->getHeaders(),
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
	    //\Bitrix\Main\Diag\Debug::writeToFile(debug_backtrace(), $url);
	    $res = $this->httpClient->get($url . static::QUESTION_MARK . http_build_query($payload));
	    $this->checkErrors();
	    return new TransportClientResponse(
		    $this->httpClient->getStatus(),
		    $this->getHeaders(),
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
    	\Bitrix\Main\Diag\Debug::writeToFile([$url, $parameter_name, $path], __METHOD__);
	    \Bitrix\Main\Diag\Debug::writeToFile(debug_backtrace(), $url);
	    $payload = [
		    $parameter_name => [
			    'resource' => fopen($path, 'r'),
			    // дополнительные параметры
			    // 'content' => содержимое файла
			    // 'filename' => название файла
			    // 'contentType' => тип
		    ]
	    ];
	    $res = $this->httpClient->post($url, $payload, true);
	    $this->checkErrors();
	    return new TransportClientResponse(
		    $this->httpClient->getStatus(),
		    $this->getHeaders(),
		    $res
	    );
    }
}
