<?php namespace SIKessEm\ArrayConfig;

abstract class AbstractLoader implements LoaderInterface {

  public function __construct(string $root) {

    $this->setRoot($root);
  }
}
