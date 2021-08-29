<?php namespace SIKessEm\ArrayConfig;

trait SettingsArrayTrait {
  
  use SettingsOffsetsTrait;

  function count(): int {
    return count($this->options);
  }

  function getIterator(): \Traversable {
    return new \ArrayIterator($this->options);
  }
}
