<?php namespace SIKessEm\ArrayConfig;

abstract class AbstractSettings implements SettingsInterface {

  function __construct(array $options = []) {

    $this->setOptions($options);
  }
}
