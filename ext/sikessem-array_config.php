<?php namespace SIKessEm\ArrayConfig;

function loader(string $dir): Loader {
  
  static $loaders;

  if(!isset($loaders[$dir])) $loaders[$dir] = new Loader($dir);

  return $loaders[$dir];
}