<?php

namespace VK\Transport;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use Psr\Http\Message\RequestInterface;
use GuzzleHttp\Utils;

class Client extends HttpClient
{
    private const USER_AGENT = 'VK/php-sdk lib/5.131 api/5.131';

    /**
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $stack = new HandlerStack();
        $stack->setHandler(Utils::chooseHandler());

        $stack->push(Middleware::mapRequest(function (RequestInterface $r) {
            return $r->withHeader('User-Agent', self::USER_AGENT . ' php/' . phpversion());
        }));

        parent::__construct(array_merge(
            $config,
            ['handler' => $stack]
        ));
    }
}
