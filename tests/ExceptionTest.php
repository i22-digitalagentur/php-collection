<?php
/**
 * PHP-Collection
 *
 * @category PHP-Collection
 * @package  Collection
 */
namespace Collection\Tests;

use Collection\Exception;

/**
 * Test case for Exception.
 *
 * @category   PHP-Collection
 * @package    Tests
 * @subpackage Collection
 */
class ExceptionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * The exception, a.k.a. system under test.
     *
     * @var Exception
     */
    protected $exception;

    /**
     * Set up.
     */
    public function setUp()
    {
        $this->exception = new Exception();
    }

    /**
     * Tear down.
     */
    public function tearDown()
    {
        $this->exception = null;
    }

    /**
     * Ensurse the exception extends PHPs \Exception.
     */
    public function testExceptionShouldExtendPhpsExtension()
    {
        $this->assertInstanceOf(
            "\Exception",
            $this->exception
        );
    }
}
