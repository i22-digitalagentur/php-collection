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
 * Filter for an object.
 *
 * Calls the given getter and compares the result with the expected value.
 *
 * @category   PHP-Collection
 * @package    Collection
 * @subpackage Filter
 */
class Getter implements FilterInterface
{
    /**
     * Expected value if the getter is called on the item.
     *
     * @var mixed
     */
    protected $expectedValue;

    /**
     * Name of the getter.
     *
     * @var string
     */
    protected $getter;

    /**
     * @param $expectedValue
     * @param $getter
     */
    public function __construct($expectedValue, $getter)
    {
        $this->expectedValue = $expectedValue;
        $this->getter = $getter;
    }

    /**
     * Checks if the given item is accepted.
     *
     * @param mixed $item
     *
     * @return boolean
     */
    public function accept($item)
    {
        return $item->{$this->getter}() == $this->expectedValue;
    }
}
