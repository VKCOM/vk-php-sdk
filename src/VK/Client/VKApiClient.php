<?php

namespace VK\Client;

use VK\Client\Actions\ActionInterface;
use VK\Exceptions\VKApiException;

/**
 * @method \VK\Actions\Account account()
 * @method \VK\Actions\Ads ads()
 * @method \VK\Actions\AppWidgets appwidgets()
 * @method \VK\Actions\Apps apps()
 * @method \VK\Actions\Asr asr()
 * @method \VK\Actions\Auth auth()
 * @method \VK\Actions\Board board()
 * @method \VK\Actions\Bugtracker bugtracker()
 * @method \VK\Actions\Calls calls()
 * @method \VK\Actions\Database database()
 * @method \VK\Actions\Docs docs()
 * @method \VK\Actions\Donut donut()
 * @method \VK\Actions\DownloadedGames downloadedgames()
 * @method \VK\Actions\Execute execute()
 * @method \VK\Actions\Fave fave()
 * @method \VK\Actions\Friends friends()
 * @method \VK\Actions\Gifts gifts()
 * @method \VK\Actions\Groups groups()
 * @method \VK\Actions\LeadForms leadforms()
 * @method \VK\Actions\Likes likes()
 * @method \VK\Actions\Market market()
 * @method \VK\Actions\Messages messages()
 * @method \VK\Actions\Newsfeed newsfeed()
 * @method \VK\Actions\Notes notes()
 * @method \VK\Actions\Notifications notifications()
 * @method \VK\Actions\Orders orders()
 * @method \VK\Actions\Pages pages()
 * @method \VK\Actions\Photos photos()
 * @method \VK\Actions\Podcasts podcasts()
 * @method \VK\Actions\Polls polls()
 * @method \VK\Actions\PrettyCards prettycards()
 * @method \VK\Actions\Search search()
 * @method \VK\Actions\Secure secure()
 * @method \VK\Actions\Stats stats()
 * @method \VK\Actions\Status status()
 * @method \VK\Actions\Storage storage()
 * @method \VK\Actions\Store store()
 * @method \VK\Actions\Stories stories()
 * @method \VK\Actions\Streaming streaming()
 * @method \VK\Actions\Users users()
 * @method \VK\Actions\Utils utils()
 * @method \VK\Actions\Video video()
 * @method \VK\Actions\Wall wall()
 * @method \VK\Actions\Widgets widgets()
 */
class VKApiClient
{
    protected const API_VERSION = '5.131';
    protected const API_HOST = 'https://api.vk.com/method';

    /**
     * @var VKApiRequest
     */
    private VKApiRequest $request;

    /**
     * @var array<string, ActionInterface>
     */
    private array $instances = [];

    /**
     * VKApiClient constructor.
     * @param string $api_version
     * @param string|null $language
     */
    public function __construct(string $api_version = self::API_VERSION, ?string $language = null)
    {
        $this->request = new VKApiRequest($api_version, $language, self::API_HOST);
    }

    /**
     * @return VKApiRequest
     */
    public function getRequest(): VKApiRequest
    {
        return $this->request;
    }

    /**
     * @param string $name
     * @param array<array-key, mixed> $_
     * @return ActionInterface
     * @throws VKApiException
     */
    public function __call(string $name, array $_): ActionInterface
    {
        $name = strtolower($name);

        $class = '\\VK\\Actions\\' . ucfirst($name);
        if (!class_exists($class)) {
            throw new VKApiException("Class {$class} not found");
        }

        if (!array_key_exists($name, $this->instances)) {
            $this->instances[$name] = new $class($this->request);
        }

        return $this->instances[$name];
    }
}
