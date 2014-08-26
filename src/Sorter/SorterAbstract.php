<?php
/**
 * PHP-Collection
 *
 * @category   PHP-Collection
 * @package    Collection
 * @subpackage Sorter
 */
namespace Collection\Sorter;

use \Collection\Sorter\Comparator\ComparatorInterface;

/**
 * Abstract for SorterInterface.
 *
 * @category   PHP-Collection
 * @package    Collection
 * @subpackage Sorter
 */
abstract class SorterAbstract implements SorterInterface
{
    /**
     * @var ComparatorInterface
     */
    protected $comparator;

    /**
     * Create a sorter.
     *
     * @param ComparatorInterface $comparator
     */
    public function __construct(ComparatorInterface $comparator)
    {
        $this->comparator = $comparator;
    }

    /**
     * @return ComparatorInterface
     */
    public function getComparator()
    {
        return $this->comparator;
    }
}
