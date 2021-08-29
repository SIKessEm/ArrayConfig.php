<?php namespace SIKessEm\ArrayConfig;

interface SettingsOffsetsInterface extends \ArrayAccess {

  function offsetExists(mixed $offset): bool;

  function offsetGet(mixed $offset): mixed;

  function offsetSet(mixed $offset, mixed $value): void;

  function offsetUnset(mixed $offset): void;
}
