<?php

namespace Phine\Test\Tests;

use Phine\Test\Property;
use Phine\Test\Test\C;
use PHPUnit_Framework_TestCase as TestCase;

/**
 * Tests the properties in the {@link PropertyTest} class.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
class PropertyTest extends TestCase
{
    /**
     * The test instance to use.
     *
     * @var C
     */
    private $c;

    /**
     * Make sure that we can find a hidden property.
     */
    public function testFind()
    {
        $property = Property::find($this->c, 'a');

        $this->assertInstanceOf(
            'ReflectionProperty',
            $property,
            'Make sure an instance of ReflectionProperty is returned.'
        );

        $this->assertEquals(
            'a',
            $property->getValue($this->c),
            'Make sure we can access the private property.'
        );

        $this->setExpectedException(
            'Phine\\Test\\Exception\\PropertyException',
            'The property "test" does not exist in the class "Phine\\Test\\Test\\C".'
        );

        Property::find($this->c, 'test');
    }

    /**
     * Make sure we can get the value of a hidden property.
     */
    public function testGet()
    {
        $this->assertEquals(
            'b',
            Property::get($this->c, 'b'),
            'Make sure we can get the value of a protected property.'
        );
    }

    /**
     * Make sure that we can set the value of a hidden property.
     *
     * @depends testGet
     */
    public function testSet()
    {
        Property::set($this->c, 'a', 123);

        $this->assertEquals(
            123,
            Property::get($this->c, 'a'),
            'Make sure we can set the value of a private property.'
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
