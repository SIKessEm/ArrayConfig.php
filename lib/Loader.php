<?php namespace SIKessEm\ArrayConfig;

class Loader {

  public function __construct(string $dir) {

    if(empty($dir))
      throw new Error('Empty directory given', Error::INVALID_DIRECTORY);

    if(in_array($dir, ['.', '..']) || preg_match('/^\.{1,2}(\/|\\\\)/U', $dir))
      throw new Error('Give an absolute path', Error::INVALID_DIRECTORY);

    if(!is_dir($dir))
      throw new Error("No such directory $dir", Error::INVALID_DIRECTORY);

    if(!is_dir($dir) || !is_readable($dir))
      throw new Error("Cannot read directory $dir", Error::INVALID_DIRECTORY);

    $this->dir = realpath($dir) . DIRECTORY_SEPARATOR;
  }

  function load(string $file): Settings {

    if(empty($file))
      throw new Error('Empty file name given', Error::INVALID_FILE);

    if(!is_file($path = $this->dir . "$file.php"))
      throw new Error("No such file $file in $this->dir");
    
    if(!is_readable($path))
      throw new Error("Cannot read file $path");
    
    $options = require $path;
    if(!is_array($options))
      throw new Error("The $path file must return an array", Error::INVALID_FILE);
    
    return new Settings($options);
  }
}
