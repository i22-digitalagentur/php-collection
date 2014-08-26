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
 * DistinctByGetter
 *
 * Reduces a collection via the given getter and makes sure that the return
 * value is distinct.
 *
 * @category   PHP-Collection
 * @package    Collection
 * @subpackage Reducer
 */
class DistinctByGetter implements ReducerInterface
{
    /**
     * Name of the getter
     *
     * @var string
     */
    protected $getter;

    /**
     * Create the DistinctByGetter reducer.
     *
     * @param $getter
     */
    public function __construct($getter)
    {
        $this->getter = $getter;
    }

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
            $key = $entry->{$this->getter}();
            if (!in_array($key, $keys)) {
                $keys[] = $key;
            }

        }
        return new Collection($keys);
    }
}
