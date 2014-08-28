<?php
/**
 * PHP-Collection
 *
 * @category   PHP-Collection
 * @package    Collection
 * @subpackage Filter
 */
namespace Collection\Filter;

/**
 * Filter checks the value of the key.
 *
 * @category   PHP-Collection
 * @package    Collection
 * @subpackage Filter
 */
class ArrayKeyValue implements FilterInterface
{
    /**
     * @var string
     */
    protected $key;

    /**
     * @var mixed
     */
    protected $value;

    /**
     * @param mixed $value
     */
    public function __construct($key, $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    /**
     * Checks if the given item is accepted.
     *
     * @param mixed $item
     *
     * @throws Exception
     *
     * @return boolean
     */
    public function accept($item)
    {
        if (!isset($item[$this->key])) {
            $message = sprintf(
                "Key %s not found!",
                $this->key
            );
            throw new Exception($message);
        }

        return $item[$this->key] == $this->value;
    }
}
