<?php

use VK\OAuth\User\DTO\AuthorizeUrlParams;
use VK\OAuth\User\DTO\Scopes;
use VK\OAuth\User\DTO\TokensParams;
use VK\OAuth\User\User;

require 'vendor/autoload.php';

$clientId = 1234567;
$clientSecret = 'secret';
$redirectUri = 'https://domain.tld';

$state = 'abc';
// @see https://datatracker.ietf.org/doc/html/rfc7636#section-4.1
$verifier = 'very_very_very_very_very_very_big_random_string';

$auth = new User();

$authParams = (new AuthorizeUrlParams(
    $clientId,
    $verifier,
    $redirectUri,
    $state,
))->setScopes([Scopes::EMAIL, Scopes::PHONE]);

$authUrl = $auth->getAuthorizeUrl($authParams);

echo '1. Copy and paste into your browser\'s address bar and press Enter: ' . $auth->getAuthorizeUrl($authParams) . "\n";
echo "2. Login\n";
echo "3. Copy url from the address bar\n";
echo "4. Paste this option below\n\n";

echo 'url > ';
$handle = fopen('php://stdin', 'r');
$url = fgets($handle);
fclose($handle);

$query = parse_url($url, PHP_URL_QUERY);
if (empty($query)) {
    echo "[err] empty query in url\n";
    exit(1);
}

parse_str($query, $q);

if (empty($q['code'])) {
    echo "[err] not found parameter code in url\n";
    exit(1);
}

if (empty($q['device_id'])) {
    echo "[err] not found parameter device_id in url\n";
    exit(1);
}

if (empty($q['state'])) {
    echo "[err] not found parameter state in url\n";
    exit(1);
}

if ($q['state'] !== $state) {
    echo "[err] invalid state value in url, expect {$state}: {$q['state']}\n";
    exit(1);
}

echo "code: " . $q['code'] . "\n";
echo "device_id: " . $q['device_id'] . "\n\n";

$tokenParams = new TokensParams($clientId, $verifier, $redirectUri, $q['code'], $q['device_id']);
$token = $auth->getTokens($tokenParams);

echo "refresh_token: " . $token['refresh_token'] . "\n";
echo "access_token: " . $token['access_token'] . "\n";
echo "id_token: " . $token['id_token'] . "\n";
echo "token type: " . $token['token_type'] . "\n";
