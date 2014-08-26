<?php
/**
 * PHP-Collection
 *
 * @category   PHP-Collection
 * @package    Collection
 * @subpackage Reducer
 */
namespace Collection\Reducer;

use Collection\CollectionInterface;

/**
 * Interface for a Reducer class.
 *
 * @category   PHP-Collection
 * @package    Collection
 * @subpackage Reducer
 */
interface ReducerInterface
{
    /**
     * Reduce the given collection.
     *
     * @param CollectionInterface $collection
     *
     * @return CollectionInterface
     */
    public function reduce(CollectionInterface $collection);
}
