<?php
/**
 * PHP-Collection
 *
 * @category   PHP-Collection
 * @package    Tests
 * @subpackage Collection
 */
namespace Collection\Tests\Sorter;

use \Collection\Sorter\Uasort;
use \Mockery;

/**
 * PHP-Collection
 *
 * @category   PHP-Collection
 * @package    Tests
 * @subpackage Collection
 */
class UasortTest extends \PHPUnit_Framework_TestCase
{
    /**
     * A mocked comparator.
     *
     * @var \Mockery\MockInterface
     */
    protected $comparator;
    /**
     * The sorter, a.k.a. system under test.
     *
     * @var Uasort
     */
    protected $sorter;

    /**
     * Set up.
     */
    public function setUp()
    {
        $this->comparator = Mockery::mock('\Collection\Comparator\ComparatorInterface');
        $this->sorter = new Uasort($this->comparator);
    }

    /**
     * Tear down.
     */
    public function tearDown()
    {
        Mockery::close();
        $this->sorter = null;
        $this->comparator = null;
    }

    /**
     * Ensures the sorter implements the sorter interface.
     */
    public function testSorterShouldImplementTheSorterInterface()
    {
        $this->assertInstanceOf(
            '\Collection\Sorter\SorterInterface',
            $this->sorter
        );
    }

    /**
     * Ensures sort() returns a new collection.
     */
    public function testSortShouldReturnANewCollection()
    {
        $collection = Mockery::mock('\Collection\CollectionInterface');
        $collection->shouldReceive("uasort");
        $actual = $this->sorter->sort($collection);
        $this->assertNotSame($collection, $actual);
    }

    /**
     * Ensures sort() calls the uasort method of the collection.
     */
    public function testSortShouldCallUsasortOfTheCollection()
    {
        $collection = Mockery::mock('\Collection\CollectionInterface');
        $collection->shouldReceive("uasort")
            ->once();
        $this->sorter->sort($collection);
    }
}
