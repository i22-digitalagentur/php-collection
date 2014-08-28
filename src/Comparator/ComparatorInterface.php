<?php
/**
 * PHP-Collection
 *
 * @category   PHP-Collection
 * @package    Collection
 * @subpackage Comparator
 */
namespace Collection\Comparator;

/**
 * Interface ComparatorInterface
 *
 * @category   PHP-Collection
 * @package    Collection
 * @subpackage Compartor
 */
interface ComparatorInterface
{
    /**
     * $left compared with $right and $right wins.
     *
     * @var int
     */
    const LEFT_LESS_THAN_RIGHT = -1;

    /**
     * $left compared with $right and booth are equals.
     *
     * @var int
     */
    const LEFT_EQUALS_RIGHT = 0;

    /**
     * $left compared with $right and $left wins.
     *
     * @var int
     */
    const LEFT_GREATER_THAN_RIGHT = 1;

    /**
     * Compares left with right.
     *
     * Should return -1, 0 and 1.
     *
     * @param $left
     * @param $right
     *
     * @return int
     */
    public function compare($left, $right);
}
