<?php
/**
 * PHP-Collection
 *
 * @category   PHP-Collection
 * @package    Collection
 * @subpackage Reducer
 */
namespace Collection\Tests\Reducer;

use \Collection\Reducer\Distinct;
use \Collection\Collection;
use \Mockery;

/**
 * Test case for Distinct.
 *
 * @category   PHP-Collection
 * @package    Collection
 * @subpackage Reducer
 */
class DistinctTest extends \PHPUnit_Framework_TestCase
{

    /**
     * The reducer, a.k.a. system under test.
     *
     * @var Distinct
     */
    protected $reducer;

    /**
     * Set up.
     */
    public function setUp()
    {
        $this->reducer = new Distinct();
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
     * Ensures reduce() returns a new collection..
     */
    public function testReduceShouldReturnNewCollection()
    {
        $items = array(42);
        $collection = new Collection($items);
        $actual = $this->reducer->reduce($collection);
        $this->assertNotSame($collection, $actual);
    }

    /**
     * Ensures reduce() returns a distinct collection.
     */
    public function testReduceShouldReturnADistinctCollection()
    {
        $items = array(
            42,
            42,
        );
        $collection = new Collection($items);
        $actual = $this->reducer->reduce($collection);
        $this->assertNotSame($collection, $actual);
        $this->assertCount(1, $actual);
    }
}
