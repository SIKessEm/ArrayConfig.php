#!/usr/bin/php
<?php use SIKessEm\ArrayConfig\Loader;

function array_config(string $dir): Loader {
  static $loaders;

  if(!isset($loaders[$dir])) $loaders[$dir] = new Loader($dir);

  return $loaders[$dir];
}