<?php

namespace VK\OAuth\Scopes;

class VKOAuthUserScope {
  public const NOTIFY        = 1;
  public const FRIENDS       = 2;
  public const PHOTOS        = 4;
  public const AUDIO         = 8;
  public const VIDEO         = 16;
  public const PAGES         = 32;
  public const LINK          = 256;
  public const STATUS        = 1024;
  public const NOTES         = 2048;
  public const MESSAGES      = 4096;
  public const WALL          = 8192;
  public const ADS           = 32768;
  public const OFFLINE       = 65536;
  public const DOCS          = 131072;
  public const GROUPS        = 262144;
  public const NOTIFICATIONS = 524288;
  public const STATS         = 1048576;
  public const EMAIL         = 4194304;
  public const MARKET        = 134217728;
}
