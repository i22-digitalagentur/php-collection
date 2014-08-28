<?php
/**
 * PHP-Collection
 *
 * @category   PHP-Collection
 * @package    Collection
 * @subpackage Sorter
 */
namespace Collection\Sorter;

use Collection\CollectionInterface;
use Collection\Comparator\ComparatorInterface;

/**
 * Interface SorterInterface
 *
 * @category   PHP-Collection
 * @package    Collection
 * @subpackage Sorter
 */
interface SorterInterface
{
    /**
     * Create a sorter.
     *
     * @param ComparatorInterface $comparator
     */
    public function __construct(ComparatorInterface $comparator);

    /**
     * @param CollectionInterface $collection
     * @return CollectionInterface
     */
    public function sort(CollectionInterface $collection);
}
