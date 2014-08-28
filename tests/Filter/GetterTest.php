<?php
/**
 * PHP-Collection
 *
 * PHP Version 5.5.9
 * PHPUnit Version 3.7.37
 *
 * @category   PHP-Collection
 * @package    Tests
 * @subpackage Filter
 */
namespace Collection\Tests\Filter;

use \Collection\Filter\Getter;
use \Mockery;

/**
 * Test case for filter Getter.
 *
 * @package    Tests
 * @subpackage Filter
 */
class GetterTest extends \PHPUnit_Framework_TestCase
{

    /**
     * The filter, a.k.a. system under test.
     *
     * @var Getter
     */
    protected $filter;

    /**
     * Set up.
     */
    public function setUp()
    {
        $this->filter = new Getter(42, "meaningOfLife");
    }

    /**
     * Tear down.
     */
    public function tearDown()
    {
        $this->filter = null;
        Mockery::close();
    }

    /**
     * Ensures the filter implements the interface FilterInterface.
     */
    public function testFilterShouldImplementFilterInterface()
    {
        $this->assertInstanceOf(
            "\Collection\Filter\FilterInterface",
            $this->filter
        );
    }

    /**
     * Ensures accept() calls the appointed getter of the given item.
     */
    public function testAcceptShouldCallTheGetterAccordingly()
    {
        $item = Mockery::mock("\Collection\Tests\Assets\SimpleClass");
        $item->shouldReceive("meaningOfLife")
            ->once();
        $this->filter->accept($item);
    }

    /**
     * Ensures accept() returns true if item is accepted.
     */
    public function testAcceptShouldReturnTrue()
    {
        $item = Mockery::mock("\Collection\Tests\Assets\SimpleClass");
        $item->shouldReceive("meaningOfLife")
            ->once()
            ->andReturn(42);
        $this->filter->accept($item);
    }

    /**
     * Ensures accept() returns false if item is not accepted.
     */
    public function testAcceptShouldReturnFalse()
    {
        $item = Mockery::mock("\Collection\Tests\Assets\SimpleClass");
        $item->shouldReceive("meaningOfLife")
            ->once()
            ->andReturn(24);
        $this->filter->accept($item);
    }
}
