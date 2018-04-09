<?php

namespace VK\CallbackApi\Server;

use VK\CallbackApi\VKCallbackApiHandler;

abstract class VKCallbackApiServerHandler extends VKCallbackApiHandler {
    protected const EVENT_KEY_TYPE = 'type';
    protected const EVENT_KEY_OBJECT = 'object';
    protected const EVENT_KEY_SECRET = 'secret';
    protected const EVENT_KEY_GROUP_ID = 'group_id';

    protected const CALLBACK_EVENT_CONFIRMATION = 'confirmation';

    /**
     * @param int $group_id
     * @param null|string $secret
     */
    abstract function confirmation(int $group_id, ?string $secret);

    /**
     * @param $event
     */
    public function parse($event) {
        if ($event->type == static::CALLBACK_EVENT_CONFIRMATION) {
            $this->confirmation($event->group_id, $event->secret);
        } else {
            parent::parseObject($event->group_id, $event->secret, $event->type, (array)$event->object);
        }
    }
}
