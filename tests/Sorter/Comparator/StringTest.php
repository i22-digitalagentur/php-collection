<?php
/**
 * PHP-Collection
 *
 * @category   PHP-Collection
 * @package    Tests
 * @subpackage Collection
 */
namespace Collection\Tests\Sorter\Comparator;

use \Collection\Sorter\Comparator\String;

/**
 * Test case for comparator String.
 *
 * @category   PHP-Collection
 * @package    Tests
 * @subpackage Collection
 */
class StringTest extends \PHPUnit_Framework_TestCase
{
    /**
     * The comparator, a.k.a. system under test.
     *
     * @var \Collection\Sorter\Comparator\String
     */
    protected $comparator;

    /**
     * Set up.
     */
    public function setUp()
    {
        $this->comparator = new String();
    }

    /**
     * Tear down.
     */
    public function tearDown()
    {
        $this->comparator = null;
    }

    /**
     * Ensures the comparator implements the interface ComparatorInterface.
     */
    public function testComparatorShouldImplementComparatorInterface()
    {
        $this->assertInstanceOf(
            '\Collection\Sorter\Comparator\ComparatorInterface',
            $this->comparator
        );
    }

    /**
     * Ensures compare() returns the correct value.
     *
     * @dataProvider dataProviderCompareShouldReturnCorrectValue
     *
     * @param string $left     Left string.
     * @param string $right    Right string.
     * @param int    $expected Expected return value.
     */
    public function testCompareShouldReturnCorrectValue(
        $left,
        $right,
        $expected
    ) {
        $actual = $this->comparator->compare($left, $right);
        $this->assertEquals($expected, $actual);
    }

    /**
     * Data provider for testCompareShouldReturnCorrectValue.
     *
     * @return array
     */
    public function dataProviderCompareShouldReturnCorrectValue()
    {
        return array(
            array("a", "b", -1),
            array("b", "a", 1),
            array("a", "a", 0)
        );
    }
}
