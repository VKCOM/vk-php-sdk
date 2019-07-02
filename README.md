# vk-php-sdk

PHP library for VK API interaction, includes OAuth 2.0 authorization and API methods. Full VK API features documentation can be found [here](http://vk.com/dev).

This library has been created using the VK API JSON Schema. It can be found [here](https://github.com/VKCOM/vk-api-schema). It uses VK API [version](https://vk.com/dev/versions) 5.100

[![Packagist](https://img.shields.io/packagist/v/vkcom/vk-php-sdk.svg)](https://packagist.org/packages/vkcom/vk-php-sdk)

## 1. Prerequisites

* PHP 7.1 or later

## 2. Installation

The VK PHP SDK can be installed using Composer by running the following command:

```sh
composer require vkcom/vk-php-sdk
```

## 3. Initialization

Create VKApiClient object using the following code:

```php
$vk = new VK\Client\VKApiClient();
```

Also you can initialize `VKApiClient` with different API version and different language like this:

```php
$vk = new VKApiClient('5.100');
```

```php
$vk = new VKApiClient('5.100', VK\Client\Enums\VKLanguage::ENGLISH);
```

## 4. Authorization

The library provides the authorization flows for user based on OAuth 2.0 protocol implementation in vk.com API. Please read the full [documentation](https://vk.com/dev/access_token) before you start.

### 4.1. Authorization Code Flow

OAuth 2.0 Authorization Code Flow allows calling methods from the server side.

This flow includes two steps — obtaining an authorization code and exchanging the code for an access token. Primarily you should obtain the "code" ([manual user access](https://vk.com/dev/authcode_flow_user) and [manual community access](https://vk.com/dev/authcode_flow_group)) by redirecting the user to the authorization page using the following method:

Create `VKOAuth` object first:
```php
$oauth = new VK\OAuth\VKOAuth();
```

#### 4.1.1. For getting **user access key** use following command:
```php
$oauth = new VK\OAuth\VKOAuth();
$client_id = 1234567;
$redirect_uri = 'https://example.com/vk';
$display = VK\OAuth\VKOAuthDisplay::PAGE;
$scope = [VK\OAuth\Scopes\VKOAuthUserScope::WALL, VK\OAuth\Scopes\VKOAuthUserScope::GROUPS];
$state = 'secret_state_code';

$browser_url = $oauth->getAuthorizeUrl(VK\OAuth\VKOAuthResponseType::CODE, $client_id, $redirect_uri, $display, $scope, $state);
```
#### 4.1.2. Or if you want to get **community access key** use:
```php
$oauth = new VK\OAuth\VKOAuth();
$client_id = 1234567;
$redirect_uri = 'https://example.com/vk';
$display = VK\OAuth\VKOAuthDisplay::PAGE;
$scope = [VK\OAuth\Scopes\VKOAuthGroupScope::MESSAGES];
$state = 'secret_state_code';
$groups_ids = [1, 2];

$browser_url = $oauth->getAuthorizeUrl(VK\OAuth\VKOAuthResponseType::CODE, $client_id, $redirect_uri, $display, $scope, $state, $groups_ids);
```

[User access key](https://vk.com/dev/permissions?f=1.%20%D0%9F%D1%80%D0%B0%D0%B2%D0%B0%20%D0%B4%D0%BE%D1%81%D1%82%D1%83%D0%BF%D0%B0%20%D0%B4%D0%BB%D1%8F%20%D1%82%D0%BE%D0%BA%D0%B5%D0%BD%D0%B0%20%D0%BF%D0%BE%D0%BB%D1%8C%D0%B7%D0%BE%D0%B2%D0%B0%D1%82%D0%B5%D0%BB%D1%8F) and [community access key](https://vk.com/dev/permissions?f=2.%20%D0%9F%D1%80%D0%B0%D0%B2%D0%B0%20%D0%B4%D0%BE%D1%81%D1%82%D1%83%D0%BF%D0%B0%20%D0%B4%D0%BB%D1%8F%20%D1%82%D0%BE%D0%BA%D0%B5%D0%BD%D0%B0%20%D1%81%D0%BE%D0%BE%D0%B1%D1%89%D0%B5%D1%81%D1%82%D0%B2%D0%B0) uses different values inside scope array

After successful authorization user's browser will be redirected to the specified **redirect_uri**. Meanwhile the code will be sent as a GET parameter to the specified address:

```sh
https://example.com?code=CODE
```

Then use this method to get the access token:

```php
$oauth = new VK\OAuth\VKOAuth();
$client_id = 1234567;
$client_secret = 'SDAScasd'
$redirect_uri = 'https://example.com/vk';
$code = 'CODE';

$response = $oauth->getAccessToken($client_id, $client_secret, $redirect_uri, $code);
$access_token = $response['access_token'];
```

The **redirect_uri** should be the URL that was used to get a code at the first step.

### 4.2. Implicit flow

In difference with authorization code flow this flow gives you temporary access key.

Read more about [user access key](https://vk.com/dev/implicit_flow_user) and [community access key](https://vk.com/dev/implicit_flow_group).

First step to get access using Implicit flow is creating `VKOauth` object:
```php
$oauth = new VK\OAuth\VKOAuth();
```

#### 4.2.1. For getting **user access key** use following command:
```php
$oauth = new VK\OAuth\VKOAuth();
$client_id = 1234567;
$redirect_uri = 'https://example.com/vk';
$display = VK\OAuth\VKOAuthDisplay::PAGE;
$scope = [VK\OAuth\Scopes\VKOAuthUserScope::WALL, VK\OAuth\Scopes\VKOAuthUserScope::GROUPS];
$state = 'secret_state_code';
$revoke_auth = true;

$browser_url = $oauth->getAuthorizeUrl(VK\OAuth\VKOAuthResponseType::TOKEN, $client_id, $redirect_uri, $display, $scope, $state, null, $revoke_auth);
```

If you want to make user getting access anyway, set **revoke_auth** as true.

#### 4.2.2. Or if you want to get **community access key** use:
```php
$oauth = new VK\OAuth\VKOAuth();
$client_id = 1234567;
$redirect_uri = 'https://example.com/vk';
$display = VK\OAuth\VKOAuthDisplay::PAGE;
$scope = [VK\OAuth\Scopes\VKOAuthGroupScope::MESSAGES];
$state = 'secret_state_code';
$groups_ids = [1, 2];

$browser_url = $oauth->getAuthorizeUrl(VK\OAuth\VKOAuthResponseType::TOKEN, $client_id, $redirect_uri, $display, $scope, $state, $groups_ids);
```

Arguments are similar with authorization code flow

After successful authorization user's browser will be redirected to the specified **redirect_uri**. Meanwhile the access token will be sent as a fragment parameter to the specified address:

For **user access key** will be:
```sh
https://example.com#access_token=533bacf01e11f55b536a565b57531ad114461ae8736d6506a3&expires_in=86400&user_id=8492&state=123456
```
And for **community access key**:
```sh
https://example.com#access_token_XXXXXX=533bacf01e11f55b536a565b57531ad114461ae8736d6506a3&expires_in=86400
```

**access_token** is your new access token.  
**expires_in** is lifetime of access token in seconds.  
**user_id** is user identifier.  
**state** is string from `authorize` method.  
access_token_**XXXXXX** is community access token where XXXXXX is community identifier.

## 5. API Requests
 
You can find the full list of VK API methods [here](https://vk.com/dev/methods).
 
### 5.1. Request sample
 
Example of calling method **users.get**:
 
```php
$vk = new VK\Client\VKApiClient();
$response = $vk->users()->get($access_token, [
    'user_ids'  => [1, 210700286],
    'fields'    => ['city', 'photo'],
]);
```
 
### 5.2. Uploading Photos into a Private Message
 
Please read [the full manual](https://vk.com/dev/upload_files?f=4.%20Uploading%20Photos%20into%20a%20Private%20Message) before the start.
 
Call **photos.getMessagesUploadServer** to receive an upload address:
 
```php
$vk = new VK\Client\VKApiClient();
$address = $vk->photos()->getMessagesUploadServer('{access_token}');
```

Then use **upload()** method to send files to the **upload_url** address received in the previous step:

```php
$vk = new VK\Client\VKApiClient();
$photo = $vk->getRequest()->upload($address['upload_url'], 'photo', 'photo.jpg');
```

You will get a JSON object with **server**, **photo**, **hash** fields. To save a photo call **photos.saveMessagesPhoto** with these three parameters:

```php
$vk = new VK\Client\VKApiClient();
$response_save_photo = $vk->photos()->saveMessagesPhoto($access_token, [
    'server' => $photo['server'],
    'photo'  => $photo['photo'],
    'hash'   => $photo['hash'],
]);
```

Then you can use **owner_id** and **id** parameters from the last response to create an attachment of the uploaded photo. 

### 5.3. Uploading Video Files
 
Please read [the full manual](https://vk.com/dev/upload_files_2?f=9.%20Uploading%20Video%20Files) before the start.
 
Call **video.save** to get a video upload server address:

```php
$vk = new VK\Client\VKApiClient();
$address = $vk->video()->save($access_token, [
    'name' => 'My video',
]);
```

Send a file to **upload_url** received previously calling **upload()** method:

```php
$vk = new VK\Client\VKApiClient();
$video = $vk->getRequest()->upload($address['upload_url'], 'video_file', 'video.mp4');
```

Videos are processed for some time after uploading.

## 6. Groups updates
 
### 6.1. Long Poll

Enable Long Poll for your group and specify which events should be tracked by calling the following API method:

```php
$vk = new VK\Client\VKApiClient();
$vk->groups()->setLongPollSettings($access_token, [
  'group_id'      => 159895463,
  'enabled'       => 1,
  'message_new'   => 1,
  'wall_post_new' => 1,
]);
```

Override methods from VK\CallbackApi\VKCallbackApiHandler class for handling events:

```php
class CallbackApiMyHandler extends VK\CallbackApi\VKCallbackApiHandler {
    public function messageNew($object) {
        echo 'New message: ' . $object['body'];
    }
    
    public function wallPostNew($object) {
        echo 'New wall post: ' . $object['text'];
    }
}
```

To start listening to LongPoll events, create an instance of your CallbackApiMyHandler class, instance of VK\CallbackApi\LongPoll\VKCallbackApiLongPollExecutor class and call method listen():

```php
$vk = new VK\Client\VKApiClient();
$access_token = 'asdj4iht2i4ntokqngoiqn3ripogqr';
$group_id = 159895463;
$wait = 25;

$handler = new CallbackApiMyHandler();
$executor = new VK\CallbackApi\LongPoll\VKCallbackApiLongPollExecutor($vk, $access_token, $group_id, $handler, $wait);
$executor->listen();
```

Parameter **wait** is the waiting period.

While calling function **listen()** you can also specify the number of the event from which you want to receive data. The default value is the number of the last event.

Example:

```php
$vk = new VK\Client\VKApiClient();
$access_token = 'asdj4iht2i4ntokqngoiqn3ripogqr';
$group_id = 159895463;
$timestamp = 12;
$wait = 25;

$executor = new VK\CallbackApi\LongPoll\VKCallbackApiLongPollExecutor($vk, $access_token, $group_id, $handler, $wait);
$executor->listen($timestamp);
```

### 6.2. Callback API

CallbackApi handler will wait for event notifications form VK. Once an event has occurred, you will be notified of it and will be able to handle it. More information [here](https://vk.com/dev/callback_api).

To start using Callback API you need to configure it under the "Manage community" tab of your community page. 

The first step is confirming your domain. VK sends a request to your server with the event type **confirmation** and you need to send back a confirmation string. For other types of events you need to send back `ok` string.

Take a look at this example:
```php
class ServerHandler extends VK\CallbackApi\Server\VKCallbackApiServerHandler {
    const SECRET = 'ab12aba';
    const GROUP_ID = 123999;
    const CONFIRMATION_TOKEN = 'e67anm1';

    function confirmation(int $group_id, ?string $secret) {
        if ($secret === static::SECRET && $group_id === static::GROUP_ID) {
            echo static::CONFIRMATION_TOKEN;
        }
    }
    
    public function messageNew(int $group_id, ?string $secret, array $object) {
        echo 'ok';
    }
}

$handler = new ServerHandler();
$data = json_decode(file_get_contents('php://input'));
$handler->parse($data);
```

To handle events you need to override methods from VK\CallbackApi\Server\VKCallbackApiServerHandler class as shown above. 

`confirmation` event handler has 2 arguments: group id, and secret key. You need to override this method.

