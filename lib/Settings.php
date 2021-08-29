<?php namespace SIKessEm\ArrayConfig;

class Settings implements \ArrayAccess, \Countable {

  public function __construct(array $options = []) {
    $this->setOptions($options);
  }

  /**
   * @var array Options list
   */
  protected array $options = [];

  public function offsetExists(mixed $offset): bool {
    return $this->issetOption($offset);
  }

  public function offsetGet(mixed $offset): mixed {
    return $this->getOption($offset);
  }

  public function offsetSet(mixed $offset, mixed $value): void {
    $this->setOption($offset, $value);
  }

  public function offsetUnset(mixed $offset): void {
    $this->unsetOption($offset);
  }

  public function count(): int {
    return count($this->options);
  }

  public function getIterator(): Traversable {
    return new ArrayIterator($this->options);
  }

  /**
   * Set options list
   *
   * @param  array $options Options list
   * @return self
   */
  public function setOptions(array $options, string $delimiter = '.'): self {
    foreach($options as $key => $value)
      is_int(strpos($key, $delimiter))?
        $this->setGroup($key, $value, $delimiter):
        $this->setOption($key, $value);
    return $this;
  }

  /**
   * Set an option
   * @param string|int $key   The option key
   * @param mixed      $value The option value
   */
  public function setOption(string|int $key, mixed $value): self {
    if(is_array($value))
      $value = new Settings($value);
    $this->options[$key] = $value;
    return $this;
  }

  /**
   * Set a group of options
   * @param  string $key   The group key
   * @param  mixed  $value The option value
   * @return self
   */
  public function setGroup(string $key, mixed $value, string $delimiter): self {
    $keys = explode($delimiter, $key);
    if(count($keys) <= 1)
      return $this->setOption($key, $value);

    $key = $keys[0];
    if(!isset($this->options[$key]))
      $this->options[$key] = [];

    $group = &$this->options[$key];
    if(is_array($group))
      $group = new Settings($group);
    elseif(!is_object($group) || !($group instanceof Settings))
      throw new \RuntimeException("Cannot use $key as group");

    unset($keys[0]);
    $key = implode('.', $keys);
    return $group->setOption($key, $value);
  }

  /**
   * Get an option

   * @param  string|int $key The option key
   * @return mixed                  The option value
   */
  public function getOption(string|int $key): mixed {
    return $this->options[$key] ?? null;
  }

  /**
   * Check if an option exists
   *
   * @param  string|int $key The option key
   * @return bool                   The option exists
   */
  public function issetOption(string|int $key): bool {
   return isset($this->options[$key]);
  }

  /**
   * Unset an option
   *
   * @param string|int $key The option key
   */
  public function unsetOption(string|int $key): void {
   unset($this->options[$key]);
  }

  /**
   * Get options list
   *
   * @return array Options list
   */
  public function getOptions(): array {
    return $this->options;
  }

  public function __get(string $key): mixed {
    return $this->getOption($key);
  }

  public function __set(string $key, mixed $value): void {
    $this->setOption($key, $value);
  }

  public function __isset(string $key): bool {
    return $this->issetOption($key);
  }

  public function __unset(string $key): void {
    $this->unsetOption($key);
  }
}
