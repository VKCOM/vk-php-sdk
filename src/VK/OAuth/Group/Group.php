<?php

declare(strict_types = 1);

namespace VK\OAuth\Group;

use Psr\Http\Client\ClientInterface;
use VK\Exceptions\VKClientException;
use VK\Exceptions\VKOAuthException;
use VK\OAuth\AbstractOAuth;
use VK\OAuth\Group\DTO\AccessTokenParams;
use VK\OAuth\Group\DTO\AuthorizeUrlParams;

class Group extends AbstractOAuth
{
    protected const VERSION = '5.199';

    protected const HOST = 'https://oauth.vk.ru';
    private const ENDPOINT_AUTHORIZE = '/authorize';
    private const ENDPOINT_ACCESS_TOKEN = '/access_token';

    /**
     * @var string
     */
    private string $version;

    /**
     * @param ClientInterface|null $client
     */
    public function __construct(?ClientInterface $client = null)
    {
        parent::__construct($client);
        $this->version = self::VERSION;
        $this->host = static::HOST;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function setVersion(string $version): self
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @param AuthorizeUrlParams $params
     * @return string
     */
    public function getAuthorizeUrl(AuthorizeUrlParams $params): string {
        return $this->host . static::ENDPOINT_AUTHORIZE . '?' . http_build_query($params->toArray($this->version));
    }

    /**
     * @param AccessTokenParams $params
     * @return array<string, mixed>
     * @throws VKClientException
     * @throws VKOAuthException
     */
    public function getAccessToken(AccessTokenParams $params): array
    {
        return $this->request('GET',  $this->host . static::ENDPOINT_ACCESS_TOKEN, [
            'query' => $params->toArray(),
            'timeout' => $this->timeout,
        ]);
    }
}
