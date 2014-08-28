<?php
/**
 * PHP-Collection
 *
 * @category PHP-Collection
 * @package  Collection
 */
namespace Collection;

use Collection\Filter\FilterInterface;
use Collection\Reducer\ReducerInterface;
use Collection\Sorter\SorterInterface;

/**
 * The Collection provides a clean way to handle large list of data..
 *
 * @category PHP-Collection
 * @package  Collection
 */
class Collection extends \ArrayObject implements CollectionInterface
{
    /**
     * Runs through all items and returns a collection with items accepted by the given filter.
     *
     * @param FilterInterface $filter
     *
     * @return Collection
     */
    public function filter(FilterInterface $filter)
    {
        $result = array();
        foreach ($this as $item) {
            if ($filter->accept($item) === true) {
                $result[] = $item;
            }
        }
        return new self($result);
    }

    /**
     * Sort the collection using the given sorter and returns a new sorted collection.
     *
     * @param SorterInterface $sort
     *
     * @return Collection
     */
    public function sort(SorterInterface $sorter)
    {
        return $sorter->sort($this);
    }

    /**
     * Reduces the collection.
     *
     * @param ReducerInterface $reducer
     *
     * @return Collection
     */
    public function reduce(ReducerInterface $reducer)
    {
        return $reducer->reduce($this);
    }

    /**
     * Get the first element of the collection.
     *
     * @return mixed
     */
    public function getFirst()
    {
        foreach ($this as $element) {
            return $element;
        }
        return null;
    }

    /**
     * Checks if the collection is empty and has no elements.
     *
     * @return boolean
     */
    public function isEmpty()
    {
        return $this->count() == 0;
    }
}
