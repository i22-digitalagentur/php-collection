<?php
/**
 * PHP-Collection
 *
 * @category   PHP-Collection
 * @package    Collection
 * @subpackage Sorter
 */
namespace Collection\Sorter\Comparator;

/**
 * Interface ComparatorInterface
 *
 * @category   PHP-Collection
 * @package    Collection
 * @subpackage Sorter
 */
interface ComparatorInterface
{
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
