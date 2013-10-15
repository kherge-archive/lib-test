<?php

namespace Phine\Test;

use Phine\Test\Exception\PropertyException;
use ReflectionClass;
use ReflectionProperty;

/**
 * Manages access to a protected or private class property.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
class Property
{
    /**
     * Finds a property for the given class.
     *
     * @param object|string $class  The class instance or name.
     * @param string        $name   The name of a property.
     * @param boolean       $access Make the property accessible?
     *
     * @return ReflectionProperty The property.
     *
     * @throws PropertyException If the property does not exist.
     */
    public static function find($class, $name, $access = true)
    {
        $reflection = new ReflectionClass($class);

        while (!$reflection->hasProperty($name)) {
            if (!($reflection = $reflection->getParentClass())) {
                throw PropertyException::notExist($class, $name);
            }
        }

        $property = $reflection->getProperty($name);
        $property->setAccessible($access);

        return $property;
    }

    /**
     * Returns the current value of a property.
     *
     * @param object|string $class  The class instance or name.
     * @param string        $name   The name of a property.
     *
     * @return mixed The current value of the property.
     */
    public static function get($class, $name)
    {
        return static::find($class, $name)->getValue(
            is_object($class) ? $class : null
        );
    }

    /**
     * Sets the new value of a property.
     *
     * @param object|string $class  The class instance or name.
     * @param string        $name   The name of a property.
     * @param mixed         $value  The new value.
     */
    public static function set($class, $name, $value)
    {
        static::find($class, $name)->setValue(
            is_object($class) ? $class : null,
            $value
        );
    }
}
