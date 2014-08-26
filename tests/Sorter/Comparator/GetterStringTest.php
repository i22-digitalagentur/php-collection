<?php
/**
 * PHP-Collection
 *
 * @category   PHP-Collection
 * @package    Tests
 * @subpackage Collection
 */
namespace Collection\Tests\Sorter\Comparator;

use \Collection\Sorter\Comparator\GetterString;

/**
 * Test case for comparator String.
 *
 * @category   PHP-Collection
 * @package    Tests
 * @subpackage Collection
 */
class GetterStringTest extends \PHPUnit_Framework_TestCase
{
    /**
     * The comparator, a.k.a. system under test.
     *
     * @var GetterString
     */
    protected $comparator;

    /**
     * Set up.
     */
    public function setUp()
    {
        $this->comparator = new GetterString("meaningOfLife");
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
            array(
                $this->createMock("a"),
                $this->createMock("b"),
                -1,
            ),
            array(
                $this->createMock("b"),
                $this->createMock("1"),
                49,
            ),
            array(
                $this->createMock("a"),
                $this->createMock("a"),
                0,
            ),
        );
    }

    /**
     * Creates a mock for SimpleClassInterface and makes sure the
     * method "meaningOfLife" is called once an returns the given
     * value.
     *
     * @param mixed $returnValue The value that the mock should return.
     *
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function createMock($returnValue)
    {
        $mock = $this->getMock(
            'Collection\Tests\Assets\SimpleClass',
            array("meaningOfLife")
        );
        $mock->expects($this->once())
            ->method("meaningOfLife")
            ->will($this->returnValue($returnValue));
        return $mock;
    }
}
