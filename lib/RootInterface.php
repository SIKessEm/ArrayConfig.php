<?php namespace SIKessEm\ArrayConfig;

interface RootInterface {

  /**
   * Get the loader root directory
   * 
   * @return string The loader root directory
   */
  function getRoot(): string;

  /**
   * Set the loader root directory
   * 
   * @param string $root The new loader root
   * @return static The static loader
   */
  function setRoot(string $root): static;
}
