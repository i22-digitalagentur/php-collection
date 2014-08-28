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

use Collection\Filter\ArrayKeyValue;

/**
 * Test case for filter ArrayKeyValue.
 *
 * @category   PHP-Collection
 * @package    Tests
 * @subpackage Filter
 */
class ArrayKeyValueTest extends \PHPUnit_Framework_TestCase
{

    /**
     * The filter, a.k.a. system under test.
     *
     * @var ArrayKeyValue
     */
    protected $filter;

    /**
     * Set up.
     */
    public function setUp()
    {
        $this->filter = new ArrayKeyValue("the_key", "the_value");
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
        $item,
        $expected
    ) {
        $actual = $this->filter->accept($item);
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
            array(array("the_key" => "the_value"), true),
            array(array("the_key" => "different_value"), false),
        );
    }

    /**
     * Ensure accept() throws an exception if the given key is not defined.
     */
    public function testAcceptShouldThrowExceptionIfKeyIsNotFound()
    {
        $this->setExpectedException("\Collection\Filter\Exception");
        $item = array("not_the_key" => 42);
        $this->filter->accept($item);
    }
}
