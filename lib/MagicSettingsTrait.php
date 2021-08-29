<?php namespace SIKessEm\ArrayConfig;

trait MagicSettingsTrait {

  use SettingsOptionsTrait;

  function __get(string $key): mixed {
    return $this->getOption($key);
  }

  function __set(string $key, mixed $value): void {
    $this->setOption($key, $value);
  }

  function __isset(string $key): bool {
    return $this->issetOption($key);
  }

  function __unset(string $key): void {
    $this->unsetOption($key);
  }
}
