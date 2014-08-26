<?php
/**
 * PHP-Collection
 *
 * @category   PHP-Collection
 * @package    Collection
 * @subpackage Reducer
 */
namespace Collection\Tests\Reducer;

use \Collection\Reducer\DistinctByGetter;
use \Collection\Collection;
use \Mockery;

/**
 * Test case for DistinctByGetter.
 *
 * @category   PHP-Collection
 * @package    Collection
 * @subpackage Reducer
 */
class DistinctByGetterTest extends \PHPUnit_Framework_TestCase
{

    /**
     * The reducer, a.k.a. system under test.
     *
     * @var DistinctByGetter
     */
    protected $reducer;

    /**
     * Set up.
     */
    public function setUp()
    {
        $this->reducer = new DistinctByGetter("meaningOfLife");
    }

    /**
     * Tear down.
     */
    public function tearDown()
    {
        $this->reducer = null;
        Mockery::close();
    }

    /**
     * Ensures the reducer implements the interface ReducerInterface.
     */
    public function testReducerShouldImplementTheInterface()
    {
        $this->assertInstanceOf(
            "\Collection\Reducer\ReducerInterface",
            $this->reducer
        );
    }

    /**
     * Ensures reduce() uses the appointed getter of the items.
     */
    public function testReduceShouldUseTheGetterOfTheItems()
    {
        $item = Mockery::mock("\Collection\Tests\Assets\SimpleClass");
        $item->shouldReceive("meaningOfLife")
            ->once();
        $items = array(
            $item,
        );
        $collection = new Collection($items);
        $this->reducer->reduce($collection);
    }

    /**
     * Ensures reduce() returns a new collection..
     */
    public function testReduceShouldReturnNewCollection()
    {
        $item = Mockery::mock("\Collection\Tests\Assets\SimpleClass");
        $item->shouldReceive("meaningOfLife")
            ->once();
        $items = array(
            $item,
        );
        $collection = new Collection($items);
        $actual = $this->reducer->reduce($collection);
        $this->assertNotSame($collection, $actual);
    }

    /**
     * Ensures reduce() returns a distinct collection.
     */
    public function testReduceShouldReturnADistinctCollection()
    {
        $item = Mockery::mock("\Collection\Tests\Assets\SimpleClass");
        $item->shouldReceive("meaningOfLife")
            ->twice()
            ->andReturn(42);
        $items = array(
            $item,
            $item,
        );
        $collection = new Collection($items);
        $actual = $this->reducer->reduce($collection);
        $this->assertNotSame($collection, $actual);
        $this->assertCount(1, $actual);
    }
}
