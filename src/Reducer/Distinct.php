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
use Collection\Collection;

/**
 * Distinct.
 *
 * Reduces a collection to only unique items.
 *
 * @category   PHP-Collection
 * @package    Collection
 * @subpackage Reducer
 */
class Distinct implements ReducerInterface
{
    /**
     * Reduce the given collection.
     *
     * @param CollectionInterface $collection
     *
     * @return CollectionInterface
     */
    public function reduce(CollectionInterface $collection)
    {
        $keys = array();
        foreach ($collection as $entry) {
            if (!in_array($entry, $keys)) {
                $keys[] = $entry;
            }

        }
        return new Collection($keys);
    }
}
