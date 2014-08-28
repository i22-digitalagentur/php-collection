<?php
/**
 * PHP-Collection
 *
 * @category   PHP-Collection
 * @package    Collection
 * @subpackage Compartor
 */
namespace Collection\Comparator;

/**
 * Compares two objects based on the return value of a given getter.
 *
 * @category   PHP-Collection
 * @package    Collection
 * @subpackage Comparator
 */
class GetterString implements ComparatorInterface
{
    /**
     * @var string
     */
    protected $getter;

    /**
     * @param string $getter The name of the getter.
     */
    public function __construct($getter)
    {
        $this->getter = $getter;
    }

    /**
     * @param $left
     * @param $right
     * @return mixed
     */
    public function compare($left, $right)
    {
        $leftValue = $left->{$this->getter}();
        $rightValue = $right->{$this->getter}();
        return strcmp($leftValue, $rightValue);
    }
}
