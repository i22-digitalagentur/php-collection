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

use \Collection\Filter\Unequal;

/**
 * Test case for filter Unequal.
 *
 * @category   PHP-Collection
 * @package    Tests
 * @subpackage Filter
 */
class UnequalsTest extends \PHPUnit_Framework_TestCase
{

    /**
     * The filter, a.k.a. system under test.
     *
     * @var Equal
     */
    protected $filter;

    /**
     * Set up.
     */
    public function setUp()
    {
        $this->filter = new Unequal(42);
    }

    /**
     * Tear down.
     */
    public function tearDown()
    {
        $this->filter = null;
    }

    /**
     * Ensures the filter implements FilterInterface.
     */
    public function testFilterShouldImplementsTheFilterInterface()
    {
        $this->assertInstanceOf(
            "\Collection\Filter\FilterInterface",
            $this->filter
        );
    }

    /**
     * Ensures accept() works.
     *
     * @dataProvider dataProviderAcceptShouldWork
     *
     * @param $value
     * @param $expected
     */
    public function testAcceptShouldWork(
        $value,
        $expected
    ) {
        $actual = $this->filter->accept($value);
        $this->assertSame($expected, $actual);
    }

    /**
     * Data provider for testAcceptShouldWork.
     *
     * @return array
     */
    public function dataProviderAcceptShouldWork()
    {
        return array(
            array(42, false),
            array("something different", true),
        );
    }
}
