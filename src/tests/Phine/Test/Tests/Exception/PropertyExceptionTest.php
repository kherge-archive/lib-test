<?php

namespace Phine\Test\Tests\Exception;

use Phine\Test\Exception\PropertyException;
use PHPUnit_Framework_TestCase as TestCase;

/**
 * Tests the methods in the {@link MethodExceptionTest} class.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
class PropertyExceptionTest extends TestCase
{
    /**
     * Make sure we can create a new exception for a missing property.
     */
    public function testNotExist()
    {
        $this->assertEquals(
            'The property "test" does not exist in the class "' . __CLASS__ . '".',
            PropertyException::notExist($this, 'test')->getMessage(),
            'Make sure we get the expected exception message.'
        );
    }
}
