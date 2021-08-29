<?php namespace SIKessEm\ArrayConfig;

interface SettingsArrayInterface

extends SettingsOffsetsInterface, \Countable, \IteratorAggregate {

  function count(): int;

  function getIterator(): \Traversable;
}
