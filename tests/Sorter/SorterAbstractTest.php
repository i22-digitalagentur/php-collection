<?php
/**
 * PHP-Collection
 *
 * @category   PHP-Collection
 * @package    Tests
 * @subpackage Collection
 */
namespace Collection\Tests\Sorter;

/**
 * Test case for SorterAbstract.
 *
 * @category   PHP-Collection
 * @package    Tests
 * @subpackage Collection
 */
class SorterAbstractTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Ensures constructor sets the comparator attribute.
     */
    public function testConstructorShouldSetTheComparatorAttribute()
    {
        $comparator = $this->getMock('\Collection\Sorter\Comparator\ComparatorInterface');
        $sorter = $this->getMockForAbstractClass('\Collection\Sorter\SorterAbstract', array($comparator));
        $this->assertSame($comparator, $sorter->getComparator());
    }
}
