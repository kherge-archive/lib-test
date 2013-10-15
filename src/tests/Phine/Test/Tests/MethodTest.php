<?php

namespace Phine\Test\Tests;

use Phine\Test\Method;
use Phine\Test\Test\C;
use PHPUnit_Framework_TestCase as TestCase;

/**
 * Tests the methods in the {@link MethodTest} class.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
class MethodTest extends TestCase
{
    /**
     * The test instance to use.
     *
     * @var C
     */
    private $c;

    /**
     * Make sure we can find a method.
     */
    public function testFind()
    {
        $method = Method::find($this->c, 'a');

        $this->assertInstanceOf(
            'ReflectionMethod',
            $method,
            'Make sure a ReflectionMethod instance is returned.'
        );

        $this->assertEquals(
            'a',
            $method->invoke($this->c),
            'Make sure we can invoke the private method.'
        );

        $this->setExpectedException(
            'Phine\\Test\\Exception\\MethodException',
            'The method "d" does not exist in the class "Phine\\Test\\Test\\C".'
        );

        Method::find($this->c, 'd');
    }

    /**
     * Make sure that we can invoke a hidden method.
     */
    public function testInvoke()
    {
        $this->assertEquals(
            'b12',
            Method::invoke($this->c, 'b', 1, 2),
            'Make sure we invoke the protected method and pass the arguments.'
        );
    }

    /**
     * Make sure that we can invoke a hidden method and pass a list of arguments.
     */
    public function testInvokeArgs()
    {
        $this->assertEquals(
            'b12',
            Method::invokeArgs($this->c, 'b', array(1, 2)),
            'Make sure we invoke the protected method and pass the list of arguments.'
        );
    }

    /**
     * Creates a new test instance to use.
     */
    protected function setUp()
    {
        $this->c = new C();
    }
}
