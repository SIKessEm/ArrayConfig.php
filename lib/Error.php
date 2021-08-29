<?php namespace SIKessEm\ArrayConfig;

class Error extends \Exception {

  const INVALID_DIRECTORY = 0x01;

  const INVALID_FILE = 0x02;

  const INVALID_OPTION = 0x03;
}
