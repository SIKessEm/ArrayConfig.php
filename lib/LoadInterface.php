<?php namespace SIKessEm\ArrayConfig;

interface LoadInterface {

  /**
   * Load a configuration file
   *
   * @param  string $file The file to load
   * @return Settings     The configuration options
   */
  function load(string $file): SettingsInterface;
}
