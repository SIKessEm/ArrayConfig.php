<?php namespace SIKessEm\ArrayConfig;

trait SettingsOffsetsTrait {

  use SettingsOptionsTrait;

  function offsetExists(mixed $offset): bool {
    return $this->issetOption($offset);
  }

  function offsetGet(mixed $offset): mixed {
    return $this->getOption($offset);
  }

  function offsetSet(mixed $offset, mixed $value): void {
    $this->setOption($offset, $value);
  }

  function offsetUnset(mixed $offset): void {
    $this->unsetOption($offset);
  }
}
