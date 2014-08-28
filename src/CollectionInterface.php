<?php
/**
 * PHP-Collection
 *
 * PHP Version 5.5.9
 *
 * @category PHP-Collection
 * @package  Collection
 */
namespace Collection;

use Collection\Filter\FilterInterface;
use Collection\Reducer\ReducerInterface;
use Collection\Sorter\SorterInterface;

/**
 * Interface for class Collection.
 *
 * @category PHP-Collection
 * @package  Collection
 */
interface CollectionInterface extends \IteratorAggregate, \ArrayAccess, \Serializable, \Countable
{
    /**
     * Runs through all items and returns a collection with items accepted by the given filter.
     *
     * @param FilterInterface $filter
     *
     * @return Collection
     */
    public function filter(FilterInterface $filter);

    /**
     * Sort the collection using the given sorter and returns a new sorted collection.
     *
     * @param SorterInterface $sort
     *
     * @return Collection
     */
    public function sort(SorterInterface $sorter);

    /**
     * Reduces the collection.
     *
     * @param ReducerInterface $reducer
     *
     * @return Collection
     */
    public function reduce(ReducerInterface $reducer);

    /**
     * (PHP 5 &gt;= 5.2.0)<br/>
     * Sort the entries with a user-defined comparison function and maintain key association
     * @link http://php.net/manual/en/arrayobject.uasort.php
     * @param callback $cmp_function <p>
     * Function <i>cmp_function</i> should accept two
     * parameters which will be filled by pairs of entries.
     * The comparison function must return an integer less than, equal
     * to, or greater than zero if the first argument is considered to
     * be respectively less than, equal to, or greater than the
     * second.
     * </p>
     * @return void
     */
    public function uasort($cmp_function);

    /**
     * Get the first element of the collection.
     *
     * If the collection is empty, null will be returned.
     *
     * @return mixed
     */
    public function getFirst();

    /**
     * Checks if the collection is empty and has no elements.
     *
     * @return boolean
     */
    public function isEmpty();
}
