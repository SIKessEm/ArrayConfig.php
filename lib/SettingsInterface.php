<?php namespace SIKessEm\ArrayConfig;

interface SettingsInterface

extends SettingsOptionsInterface, SettingsOffsetsInterface, MagicSettingsInterface, \Countable, \IteratorAggregate {

  function count(): int;

  function getIterator(): \Traversable;
}
