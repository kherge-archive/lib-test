<?php

namespace Phine\Test\Tests\Exception;

use Phine\Test\Exception\MethodException;
use PHPUnit_Framework_TestCase as TestCase;

/**
 * Tests the methods in the {@link MethodExceptionTest} class.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
class MethodExceptionTest extends TestCase
{
    /**
     * Make sure we can create a new exception for a missing method.
     */
    public function testNotExist()
    {
        $this->assertEquals(
            'The method "test" does not exist in the class "' . __CLASS__ . '".',
            MethodException::notExist($this, 'test')->getMessage(),
            'Make sure we get the expected exception message.'
        );
    }
}
