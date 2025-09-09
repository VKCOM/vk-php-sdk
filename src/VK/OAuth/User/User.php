<?php

declare(strict_types = 1);

namespace VK\OAuth\User;

use Psr\Http\Client\ClientInterface;
use VK\OAuth\AbstractOAuth;
use VK\Exceptions\VKClientException;
use VK\Exceptions\VKOAuthException;
use VK\OAuth\User\DTO\LogoutParams;
use VK\OAuth\User\DTO\IdTokenParams;
use VK\OAuth\User\DTO\AuthorizeUrlParams;
use VK\OAuth\User\DTO\TokensParams;
use VK\OAuth\User\DTO\RefreshTokensParams;

class User extends AbstractOAuth
{
    protected const HOST                  = 'https://id.vk.ru';
    protected const ENDPOINT_AUTHORIZE    = '/authorize';
    protected const ENDPOINT_TOKEN        = '/oauth2/auth';
    protected const ENDPOINT_REVOKE       = '/oauth2/revoke';
    protected const ENDPOINT_LOGOUT       = '/oauth2/logout';
    protected const ENDPOINT_USER_INFO    = '/oauth2/user_info';
    protected const ENDPOINT_PUBLIC_INFO  = '/oauth2/public_info';

    /**
     * @param ClientInterface|null $client
     */
    public function __construct(?ClientInterface $client = null)
    {
      parent::__construct($client);
      $this->host = self::HOST;
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @param string $host
     * @return $this
     */
    public function setHost(string $host): self
    {
        $this->host = $host;
        return $this;
    }

    /**
     * Build authorization url, redirect browser to start authorization process.
     *  As a success result "redirect_uri" will get "code", "device_id" & "state" params.
     *  i.e.: GET https://your.site?code=vk2.a.4dvgLdQ5....dxtBxyw&device_id=uDDd....1VrpmCpsA&state=YYYRandomXXX
     *  So compare received state with a value do you send to authorization url, it MUST be equal to continue authorization flow,
     *  otherwise terminate it for security reason.
     *  Use received "code" & "device_id" values to get access & refresh tokens.
     *
     * @param AuthorizeUrlParams $params
     * @return string
     */
    public function getAuthorizeUrl(AuthorizeUrlParams $params): string
    {
        return $this->host . static::ENDPOINT_AUTHORIZE . '?' . http_build_query($params->toArray());
    }

    /**
     * exchange authorization code for access, refresh & id tokens
     *
     * @param TokensParams $params
     * @return mixed
     * @throws VKClientException
     * @throws VKOAuthException
     */
    public function getTokens(TokensParams $params)
    {
        return $this->request('POST', $this->host . static::ENDPOINT_TOKEN, [
            'form_params' => $params->toArray(),
        ]);
    }

    /**
     * refresh tokens
     *
     * @param RefreshTokensParams $params
     * @return mixed
     * @throws VKClientException
     * @throws VKOAuthException
     */
    public function refreshTokens(RefreshTokensParams $params)
    {
        return $this->request('POST', $this->host . static::ENDPOINT_TOKEN, [
            'form_params' => $params->toArray(),
        ]);
    }

    /**
     * logout (invalidate tokens)
     *
     * @param LogoutParams $params
     * @return mixed
     * @throws VKClientException
     * @throws VKOAuthException
     */
    public function logout(LogoutParams $params)
    {
        return $this->request('POST', $this->host . static::ENDPOINT_LOGOUT, [
            'form_params' => $params->toArray(),
        ]);
    }

    /**
     * revoke granted scopes
     *
     * @param LogoutParams $params
     * @return mixed
     * @throws VKClientException
     * @throws VKOAuthException
     */
    public function revoke(LogoutParams $params)
    {
        return $this->request('POST', $this->host . static::ENDPOINT_REVOKE, [
            'form_params' => $params->toArray(),
        ]);
    }

    /**
     * get user info
     *  Access token should have following scopes to get info:
     *  vkid.personal_info - to get first & last name, avatar, sex, birthday, etc.
     *  email - to get email
     *  phone - to get phone
     *
     * @param LogoutParams $params
     * @return mixed
     * @throws VKClientException
     * @throws VKOAuthException
     */
    public function getUserInfo(LogoutParams $params)
    {
        return $this->request('POST', $this->host . static::ENDPOINT_USER_INFO, [
            'form_params' => $params->toArray(),
        ]);
    }

    /**
     * get public (masked) user info
     *
     * @param IdTokenParams $params
     * @return mixed
     * @throws VKClientException
     * @throws VKOAuthException
     */
    public function getUserPublicInfo(IdTokenParams $params)
    {
        return $this->request('POST', $this->host . static::ENDPOINT_PUBLIC_INFO, [
            'form_params' => $params->toArray(),
        ]);
    }
}
