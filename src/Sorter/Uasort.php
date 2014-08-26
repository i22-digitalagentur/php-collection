<?php
/**
 * PHP-Collection
 *
 * @category   PHP-Collection
 * @package    Collection
 * @subpackage Sorter
 */
namespace Collection\Sorter;

use Collection\Collection;
use Collection\CollectionInterface;

/**
 * Usort sorter.
 *
 * Uses the native PHP function usort.
 *
 * @category   PHP-Collection
 * @package    Collection
 * @subpackage Sorter
 */
class Uasort extends SorterAbstract implements SorterInterface
{
    /**
     * @param CollectionInterface $collection
     * @return CollectionInterface
     */
    public function sort(CollectionInterface $collection)
    {
        $collection->uasort(array($this->comparator, 'compare'));
        return new Collection($collection);
    }
}
