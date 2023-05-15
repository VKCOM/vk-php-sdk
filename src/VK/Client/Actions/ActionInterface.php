<?php

namespace VK\Client\Actions;

use VK\Client\VKApiRequest;

interface ActionInterface
{
    public function __construct(VKApiRequest $request);
}
