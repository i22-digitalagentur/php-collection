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
 * Filter checks for equality of the items.
 *
 * @category   PHP-Collection
 * @package    Collection
 * @subpackage Filter
 */
class Equal implements FilterInterface
{
    /**
     * @var mixed
     */
    protected $value;

    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        $this->value = $value;
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
        return $item == $this->value;
    }
}
