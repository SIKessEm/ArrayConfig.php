<?php namespace SIKessEm\ArrayConfig;

interface MagicSettingsInterface {

  function __get(string $key): mixed;

  function __set(string $key, mixed $value): void;

  function __isset(string $key): bool;

  function __unset(string $key): void;
}
