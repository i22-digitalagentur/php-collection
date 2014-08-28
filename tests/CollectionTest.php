<?php
/**
 * PHP-Collection
 *
 * @category   PHP-Collection
 * @package    Tests
 * @subpackage Collection
 */
namespace Collection\Tests;

use \Collection\Collection;
use \Mockery;

/**
 * Test case for class Collection.
 *
 * @category   PHP-Collection
 * @package    Tests
 * @subpackage Collection
 */
class CollectionTest extends \PHPUnit_Framework_TestCase
{

    /**
     * The collection, a.k.a. system under test.
     *
     * @var Collection
     */
    protected $collection;

    /**
     * Set up.
     */
    public function setUp()
    {
        $this->collection = new Collection();
    }

    /**
     * Tear down.
     */
    public function tearDown()
    {
        $this->collection = null;
        Mockery::close();
    }

    /**
     * Ensures the collection implements the CollectionInterface.
     */
    public function testShouldImplementsTheInterface()
    {
        $this->assertInstanceOf(
            "\Collection\CollectionInterface",
            $this->collection
        );
    }

    /**
     * Ensures the collection extends \ArrayObject.
     */
    public function testCollectionShouldBeAnHeirOfArrayObject()
    {
        $this->assertInstanceOf(
            "\ArrayObject",
            $this->collection
        );
    }

    /**
     * Ensures filter() calls the accept method of the filter.
     */
    public function testFilterShouldCallTheAcceptMethodOfTheFilter()
    {
        $this->collection->append(42);
        $filter = Mockery::mock('\Collection\Filter\FilterInterface');
        $filter->shouldReceive("accept")
            ->once()
            ->with(42)
            ->andReturn(true);
        $this->collection->filter($filter);
    }

    /**
     * Ensures filter() returns a new collection.
     */
    public function testFilterShouldReturnNewCollection()
    {
        $this->collection->append(42);
        $filter = Mockery::mock('\Collection\Filter\FilterInterface');
        $filter->shouldReceive("accept")
            ->once()
            ->with(42)
            ->andReturn(true);
        $actual = $this->collection->filter($filter);
        $this->assertNotSame($this->collection, $actual);
    }

    /**
     * Ensures filter() returns a new collection containing only the accepted
     * items.
     */
    public function testFilterShouldReturnCollectionWithOnlyAcceptedEntries()
    {
        $this->collection = new Collection(array(42, 24));
        $filter = Mockery::mock('\Collection\Filter\FilterInterface');
        $filter->shouldReceive("accept")
            ->once()
            ->with(42)
            ->andReturn(true);
        $filter->shouldReceive("accept")
            ->once()
            ->with(24)
            ->andReturn(false);
        $actual = $this->collection->filter($filter);
        $this->assertNotSame($this->collection, $actual);
        $this->assertCount(1, $actual);
    }

    /**
     * Ensures reduce() receives the collection an returns a new one.
     */
    public function testReduceShouldReceiveTheCollectionAndReturnANewOne()
    {
        $reducer = Mockery::mock('\Collection\Reducer\ReducerInterface');
        $newCollection = Mockery::mock('\Collection\CollectionInterface');
        $reducer->shouldReceive("reduce")
            ->once()
            ->with($this->collection)
            ->andReturn($newCollection);
        $actual = $this->collection->reduce($reducer);
        $this->assertSame($newCollection, $actual);
    }

    /**
     * Ensures reduce() receives the collection an returns a new one.
     */
    public function testSortShouldReceiveTheCollectionAndReturnANewOne()
    {
        $sorter = Mockery::mock('\Collection\Sorter\SorterInterface');
        $newCollection = Mockery::mock('Collection\CollectionInterface');
        $sorter->shouldReceive("sort")
            ->once()
            ->with($this->collection)
            ->andReturn($newCollection);
        $actual = $this->collection->sort($sorter);
        $this->assertSame($newCollection, $actual);
    }

    /**
     * Ensures getFirst() returns null if the collection is empty.
     */
    public function testGetFirstShouldReturnNullForAnEmptyCollection()
    {
        $this->assertCount(0, $this->collection);
        $this->assertNull($this->collection->getFirst());
    }

    /**
     * Ensures getFirst() returns the first element of the colleciton.
     */
    public function testGetFirstShouldReturnFirstElementOfTheCollection()
    {
        $expected = "the first";
        $data = array($expected, "the second");
        $collection = new Collection($data);
        $actual = $collection->getFirst();
        $this->assertSame($expected, $actual);
    }
}
