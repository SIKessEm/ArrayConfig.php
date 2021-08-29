<?php namespace SIKessEm\ArrayConfig;

trait RootTrait {

  /**
   * @var string The loader root directory
   */
  protected string $root;

  /**
   * Get the loader root directory
   * 
   * @return string The loader root directory
   */
  function getRoot(): string {

    return $this->root;
  }

  /**
   * Set the loader root directory
   * 
   * @param  string $root    The new loader root
   * @throws namespace\Error If the directory is invalid
   * @return static          The static loader
   */
  function setRoot(string $root): static {

    if(empty($root))
      throw new Error('Empty directory given', Error::INVALID_DIRECTORY);

    if(in_array($root, ['.', '..']) || preg_match('/^\.{1,2}(\/|\\\\)/U', $root))
      throw new Error('Give an absolute path', Error::INVALID_DIRECTORY);

    if(!is_dir($root))
      throw new Error("No such directory $root", Error::INVALID_DIRECTORY);

    if(!is_dir($root) || !is_readable($root))
      throw new Error("Cannot read directory $root", Error::INVALID_DIRECTORY);

    $this->root = realpath($root) . DIRECTORY_SEPARATOR;
    return $this;
  }
}