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
 * FilterInterface
 *
 * @category   PHP-Collection
 * @package    Collection
 * @subpackage Filter
 */
interface FilterInterface
{
    /**
     * Checks if the given item is accepted.
     *
     * @param mixed $item
     *
     * @return boolean
     */
    public function accept($item);
}
