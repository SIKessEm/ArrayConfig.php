<?php namespace SIKessEm\ArrayConfig;

trait SettingsTrait {
  
  use SettingsOptionsTrait, SettingsOffsetsTrait, MagicSettingsTrait;

  function count(): int {
    return count($this->options);
  }

  function getIterator(): \Traversable {
    return new \ArrayIterator($this->options);
  }
}
