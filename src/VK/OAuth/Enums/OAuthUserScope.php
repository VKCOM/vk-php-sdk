<?php

namespace VK\OAuth\Enums;

class OAuthUserScope {
    const NOTIFY = 1;
    const FRIENDS = 2;
    const PHOTOS = 4;
    const AUDIO = 8;
    const VIDEO = 16;
    const PAGES = 32;
    const LINK = 256;
    const STATUS = 1024;
    const NOTES = 2048;
    const MESSAGES = 4096;
    const WALL = 8192;
    const ADS = 32768;
    const OFFLINE = 65536;
    const DOCS = 131072;
    const GROUPS = 262144;
    const NOTIFICATIONS = 524288;
    const STATS = 1048576;
    const EMAIL = 4194304;
    const MARKET = 134217728;
}
