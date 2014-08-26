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
 * String comparator.
 *
 * Uses PHP's native strcmp function.
 *
 * @category   PHP-Collection
 * @package    Collection
 * @subpackage Sorter
 */
class String implements ComparatorInterface
{
    /**
     * Compares $left with $right, using PHP native strcmp.
     *
     * @param $left
     * @param $right
     *
     * @return int
     */
    public function compare($left, $right)
    {
        return strcmp($left, $right);
    }
}
